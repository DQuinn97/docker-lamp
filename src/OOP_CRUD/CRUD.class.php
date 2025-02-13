<?php
require_once("DB.class.php");
class CRUD
{
    use DB;
    private $db;
    public $table;

    public function __construct($table)
    {
        $this->table = $table;
        $this->db = $this->connectToDB();
    }
    public function getAll(): array | bool
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id): array | bool
    {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function deleteById($id): int
    {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->rowCount();
    }
    private function getInput($tableRow): string | null
    {
        if (str_contains($tableRow['Key'], 'PRI')) {
            return null;
        }
        if (str_contains($tableRow['Type'], 'int') || $tableRow['Type'] === 'float') {
            return '<input type="number" name="' . $tableRow['Field'] . '"' . ($tableRow['Type'] === 'float' ? 'step="0.01"' : '') . '>';
        } elseif (str_contains($tableRow['Type'], 'varchar')) {
            return '<input type="text" name="' . $tableRow['Field'] . '">';
        } elseif ($tableRow['Type'] === 'date') {
            return '<input type="date" name="' . $tableRow['Field'] . '">';
        } elseif ($tableRow['Type'] === 'tinyint(1)' || $tableRow['Type'] === 'boolean') {
            return '<input type="checkbox" name="' . $tableRow['Field'] . '">';
        } else {
            return null;
        }
    }
    public function getTableData(): array|bool
    {
        $sql = "DESCRIBE $this->table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $tableData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $tableData;
    }
    public function showTable()
    {
        $tableData = $this->getTableData();

        $form = '<form action="" method="POST">';
        foreach ($tableData as $row) {
            if ($row['Key'] !== 'PRI') {
                $form .= '<label for="' . $row['Field'] . '">' . $row['Field'] . '</label>';
                $form .= $this->getInput($row);
                $form .= '<br>';
            }
        }
        $form .= '<button type="submit" name="formSubmit" value="' . $this->table . '">submit</button>';
        $form .= '</form>';

        return $form;
    }
    public function insert(array $data)
    {
        unset($data["id"]); //only useful for update, not create
        unset($data["formSubmit"]); //cant be inserted in database => trash entry

        $tableData = $this->getTableData();
        $data = array_map(function ($key, $value) use ($tableData) {
            $dataField = array_filter($tableData, function ($dataField) use ($key, $value) {
                return $dataField["Field"] == $key;
            });
            if (count($dataField)) $dataField = [...$dataField][0]; //if correct field has been found, reset index and take first item
            else $dataField = null; //if no field has been found, convert to null for later

            if ($dataField) {
                if ($dataField["Type"] == "float") $value = (float)$value;
                if (str_starts_with($dataField["Type"], "int") || str_starts_with($dataField["Type"], "tinyint")) $value = (int)$value;
                if ($dataField["Type"] == "boolean") $value = (bool)$value;
            }
            $data[$key] = $value;
            return $data;
        }, array_keys($data), $data);

        $data = array_merge(...$data);


        // This next part is unreadable AF, but it just creates the sql query from the incoming data...
        $sql = "INSERT INTO $this->table (";
        foreach ($data as $key => $value) {
            $sql .= $key . ',';
        }
        $sql = substr($sql, 0, -1);
        $sql .= ') VALUES (';
        foreach ($data as $key => $value) {
            $sql .= ':' . $key . ',';
        }
        $sql = substr($sql, 0, -1);
        $sql .= ')';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }
}
