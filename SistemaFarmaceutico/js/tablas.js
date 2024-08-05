$(document).ready(function() {
    loadTableData();

    function loadTableData() {
        $.ajax({
            url: '../Controller/tablas.php',
            method: 'GET',
            success: function(response) {
                const data = JSON.parse(response);
                const rowsPerPage = 10;
                let currentPage = 1;

                function displayTableRows(page) {
                    const start = (page - 1) * rowsPerPage;
                    const end = start + rowsPerPage;
                    const paginatedData = data.slice(start, end);

                    let tableRows = '';
                    paginatedData.forEach(function(user) {
                        tableRows += `<tr data-id="${user.id_usuario}">
                            <td>${user.nombre}</td>
                            <td>${user.apellido}</td>
                            <td>${user.dni}</td>
                            <td>${user.direccion}</td>
                            <td>${user.telefono}</td>
                            <td>${user.correo}</td>
                            <td>${user.contrasena}</td>
                            <td>${user.tipo}</td>
                        </tr>`;
                    });
                    $('#Cuentas tbody').html(tableRows);
                    
                }

                function createPagination(totalRows, rowsPerPage) {
                    const totalPages = Math.ceil(totalRows / rowsPerPage);
                    let pagination = '<nav><ul class="pagination">';
                    for (let i = 1; i <= totalPages; i++) {
                        pagination += `<li class="page-item"><a class="page-link" href="#">${i}</a></li>`;
                    }
                    pagination += '</ul></nav>';
                    $('#pagination').html(pagination);

                    $('.page-link').click(function(e) {
                        e.preventDefault();
                        currentPage = parseInt($(this).text());
                        displayTableRows(currentPage);
                    });
                }

                createPagination(data.length, rowsPerPage);
                displayTableRows(currentPage);
            },
            error: function(xhr, status, error) {
                console.error('Error en la solicitud AJAX:', error);
            }
        });
    }
});