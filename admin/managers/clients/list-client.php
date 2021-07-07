  
        
<div class="col-md-4 form-group d-flex search-bar">
  <input type="text" id="search" class="form-control" autocomplete="off" placeholder="Search here.."><a href="#"><input type="button" value="Search" class="btn btn-info btn-md"/></a>
</div>
<div class="result">

</div>

<!---jQuery ajax live search --->
<script type="text/javascript">
    $(document).ready(function(){
        // fetch data from table without reload/refresh page
        loadData();
        function loadData(query){
          $.ajax({
            url : "client-search.php",
            type: "POST",
            chache :false,
            data:{query:query},
            success:function(response){
              $(".result").html(response);
            }
          });  
        }

        // live search data from table without reload/refresh page
        $("#search").keyup(function(){
          var search = $(this).val();
          if (search !="") {
            loadData(search);
          }else{
            loadData();
          }
        });
    });
</script>