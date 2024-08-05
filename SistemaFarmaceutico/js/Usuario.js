

// Asegúrate de ejecutar este código después de que se cargue el DOM
$(document).ready(function() {

    var funcion = '';
    var id_usuario = $('#id_usuario').val();
    buscar_usuario(id_usuario);
    
    function buscar_usuario(dato) {
        funcion='buscar_usuario';
        $.post('../Controller/ControladorUsuario.php',{dato,funcion},(response)=>{
            
            const usuario = JSON.parse(response);

            $('#nombre').text(usuario.nombre);
            $('#nombreInput').val(usuario.nombre);
            $('#nombre2').text(usuario.nombre);

            $('#apellido').text(usuario.apellido);
            $('#apellidoInput').val(usuario.apellido);
            $('#apellido2').text(usuario.apellido);

        });
    }

    // Función para cargar los tipos de usuario desde la base de datos
    function cargarTiposUsuario() {
        $.post('../Controller/ControladorUsuario.php', { funcion: 'cargar_tipos_usuario' }, function(response) {
            const tiposUsuario = JSON.parse(response);
            const tipoSelect = $('#tipo');
            tipoSelect.empty(); // Limpiar las opciones existentes
    
            // Iterar sobre los tipos de usuario y agregarlos como opciones al combobox
            tiposUsuario.forEach(function(tipo) {
                tipoSelect.append(`<option value="${tipo.id_tusuario}">${tipo.tipo}</option>`);
            });
        });
    }

    // Llamar a la función para cargar los tipos de usuario cuando se carga la página
    cargarTiposUsuario();
});

$(document).ready(function() {
    loadUsers();

    // Función para cargar los usuarios
    function loadUsers() {
        $.ajax({
            url: '../Model/CargarUsuario.php',
            method: 'GET',
            success: function(data) {
                $('#Cuentas tbody').html(data);
                initializeDataTable();
                $('#editButton').prop('disabled', true);
                $('#deleteButton').prop('disabled', true);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus + " - " + errorThrown);
            }
        });
    }

    function initializeDataTable() {
        if ($.fn.DataTable.isDataTable('#Cuentas')) {
            $('#Cuentas').DataTable().destroy();
        }

        $('#Cuentas').DataTable({
            "paging": true,
            "searching": true,
            "info": true,
            "lengthChange": false,
            "pageLength": 10,
            "scrollX": false,
            "autoWidth": false
        });
    }

    // Función para obtener la fila seleccionada
    function getSelectedRow() {
        return $('#Cuentas tbody tr.selected');
    }

    // Función para rellenar el modal con los datos de la fila seleccionada
    function populateModal(row) {
        $('#id').val(row.data('id'));
        $('#nombre').val(row.find('td:eq(0)').text());
        $('#apellido').val(row.find('td:eq(1)').text());
        $('#dni').val(row.find('td:eq(2)').text());
        $('#direccion').val(row.find('td:eq(3)').text());
        $('#telefono').val(row.find('td:eq(4)').text());
        $('#correo').val(row.find('td:eq(5)').text());
        $('#contrasena').val('');
        $('#tipo').val(row.find('td:eq(7)').data('tipo'));
    }

    // Manejar el clic en las filas de la tabla
    $('#Cuentas tbody').on('click', 'tr', function() {
        $(this).toggleClass('selected').siblings().removeClass('selected');

        // Activar/desactivar botones de editar y borrar según la selección
        const selectedRow = getSelectedRow();
        if (selectedRow.length) {
            $('#editButton').prop('disabled', false);
            $('#deleteButton').prop('disabled', false);
        } else {
            $('#editButton').prop('disabled', true);
            $('#deleteButton').prop('disabled', true);
        }
    });

    // Manejar el envío del formulario para crear/editar usuarios
    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        var actionUrl = $(this).find('#id').val() ? '../Controller/EditarCuenta.php' : '../Controller/NuevoUsuario.php';

        $.ajax({
            url: actionUrl,
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert(response);
                $('#userModal').modal('hide');
                location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus + " - " + errorThrown);
            }
        });
    });

    // Manejar el botón de editar
    $('#editButton').on('click', function() {
        var selectedRow = getSelectedRow();
        if (selectedRow.length) {
            populateModal(selectedRow);
            $('#userModalLabel').text('Editar Usuario');
            $('#userModal').modal('show');
        } else {
            alert('Por favor, seleccione una fila para editar.');
        }
    });

    // Manejar el botón de borrar
    $('#deleteButton').on('click', function() {
        var selectedRow = getSelectedRow();
        if (selectedRow.length) {
            if (confirm('¿Estás seguro de que deseas borrar este usuario?')) {
                $.ajax({
                    url: '../Controller/EliminarUsuario.php',
                    method: 'POST',
                    data: { id: selectedRow.data('id') },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert("Error: " + textStatus + " - " + errorThrown);
                    }
                });
            }
        } else {
            alert('Por favor, seleccione una fila para borrar.');
        }
    });



});