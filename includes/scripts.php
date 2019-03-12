<!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/jquery-3.3.1.min.js"></script>

    <!-- Tooltips -->
    <!--<script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/popper.min.js"></script>-->

    <!-- Bootstrap core JavaScript -->
    <!--<script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/bootstrap.min.js"></script>-->

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://mdbootstrap.com/previews/docs/latest/js/mdb.min.js"></script>
    <script>

        // SideNav Initialization
        $(".button-collapse").sideNav();
        
        new WOW().init();
    </script>
    
    <script type="text/javascript">
        function searchq()
        {
            var searchTxt = $("input[name='search']").val();
            $.post("./functions/search", {searchVal: searchTxt},function(data)
            {
                $("#data").html(data);
            });
        }
    </script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>