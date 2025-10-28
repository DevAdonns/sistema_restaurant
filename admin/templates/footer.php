    </section>
  </main>
  <br>
  <br>
  <br>
  <footer>
    <div class="container text-center mt-4 text-black">
        <p>&copy; 2025 Restaurante. Todos los derechos reservados.</p>
    </div>
  </footer>
  <script>
    $(document).ready(function () {
        $('table').DataTable({
          "pageLength": 5,
          "lengthMenu": [[5, 10, 20, 50], [5, 10, 20, 50]],
          "language": {
              "lengthMenu": "Mostrar _MENU_ registros por pagina",
              "zeroRecords": "No se encontraron registros",
              "info": "Mostrando pagina _PAGE_ de _PAGES_",
              "infoEmpty": "No hay registros disponibles",
              "infoFiltered": "(filtrado de _MAX_ registros totales)",
              "search": "Buscar:",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
          }
        });
    });
  </script>
  </body>
</html>
