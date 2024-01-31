## CSV file Read

In this following PHP code, you can read csv file and store in the mysqli database in your website easily.

## Initialization Process
- To Initial variable
```
$CSVvar = false;
```
- To Upload CSV File
```
$csv_file_name = $_FILES['csv-file']['name'];
$csv_tmp_name = $_FILES['csv-file']['tmp_name'];

$result = move_uploaded_file( $csv_tmp_name, "directoryName" . $csv_file_name );
```

- To open CSV File
```
$CSVvar = fopen( "FileNameWthPathName", "r" );
```

- To Read CSV File
```
while ( !feof( $CSVvar ) ) {
        $data = fgetcsv( $CSVvar, 1000, "," );
        echo $data[0];
}
```

- To Delete CSV File
```
$csv_file_name = $_FILES['csv-file']['name'];
$result = unlink( "uploads/csv-files/$csv_file_name" );
```


## Link jQuery & Bootstrap

+ Initialize in the Header Section For Bootstrap

```
   <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
```
+ Initialize in the Header Section For Icon

```
    <!-- For Icon  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
```

+ Initialize in the Header Section For Datatable

```
     <link
      href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />
```

+ Initialize in the Footer Section For jQuery & Datatable
```
     <!-- For jquery Access  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(document).ready(function () {
        $("#dataTable").DataTable({
          order: [[1, "asc"]],
        });
      });
    </script>
    <!-- For Datatable   -->
    <script
      src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"
      crossorigin="anonymous"
    ></script>
```

## CSV File Structure 

|   |
|:---:|
|CSV File Demo|
|![structure](https://github.com/learnwithfair/web-development-api/tree/main/PHP/csv-php/Screenshot.png)|