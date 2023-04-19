</section>
    <!-- Arquivos JavaScript -->
    <script src="js/all.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/admin-script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/mask.js"></script>

    <script type="text/javascript">

      function buscarNome(nome) {
        $.ajax({
          url: "search.php",
          method: "POST",
          data:{nome:nome},
          success:function(data){
            $('#resultado').html(data);
          }
        });
      }

      $(document).ready(function(){
        buscarNome();

        $('#buscar').keyup(function(){
          var nome = $(this).val();
          if (nome != ''){
            buscarNome(nome);
          }else{
            buscarNome();
          }
        });
      });

    </script>
  </body>
</html>