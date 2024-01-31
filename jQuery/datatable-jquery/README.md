## Data-table with jQuery

- To design table use Bootstrap-4.
- To Sort data use jQuery.


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

+ Initialize in the Footer Section For Datatable

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