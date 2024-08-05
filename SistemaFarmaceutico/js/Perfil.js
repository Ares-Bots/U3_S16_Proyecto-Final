$(document).ready(function(){
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

            $('#dni').text(usuario.dni);
            $('#dniInput').val(usuario.dni);

            $('#direccion').text(usuario.direccion);
            $('#direccionInput').val(usuario.direccion);

            $('#telefono').text(usuario.telefono);
            $('#telefonoInput').val(usuario.telefono);

            $('#correo').text(usuario.correo);
            $('#correoInput').val(usuario.correo);

            $('#tipo').text(usuario.tipo);

        });
    }

    const editButton = $('#editButton');
    const saveButton = $('#saveButton');
    const nombreInput = $('#nombreInput');
    const nombreLabel = $('#nombre');
    const apellidoInput = $('#apellidoInput');
    const apellidoLabel = $('#apellido');
    const dniInput = $('#dniInput');
    const dniLabel = $('#dni');
    const direccionInput = $('#direccionInput');
    const direccionLabel = $('#direccion');
    const telefonoInput = $('#telefonoInput');
    const telefonoLabel = $('#telefono');
    const correoInput = $('#correoInput');
    const correoLabel = $('#correo');
    const idUsuario = $('#id_usuario').val();

    editButton.click(() => {

        nombreInput.show();
        nombreLabel.hide();

        apellidoInput.show();
        apellidoLabel.hide();

        dniInput.show();
        dniLabel.hide();

        direccionInput.show();
        direccionLabel.hide();

        telefonoInput.show();
        telefonoLabel.hide();

        correoInput.show();
        correoLabel.hide();
        
        editButton.hide();
        saveButton.show();

    });

    saveButton.click(() => {

        const nombreValue = nombreInput.val();
        const apellidoValue = apellidoInput.val();
        const dniValue = dniInput.val();
        const direccionValue = direccionInput.val();
        const telefonoValue = telefonoInput.val();
        const correoValue = correoInput.val();

        $.post('../Controller/Guardar.php', { nombre: nombreValue,
            apellido: apellidoValue, dni: dniValue, direccion: direccionValue,
            telefono: telefonoValue, correo: correoValue,
            id_usuario: idUsuario }, (response) => {
            console.log(response);

            nombreLabel.text(nombreValue);
            apellidoLabel.text(apellidoValue);
            dniLabel.text(dniValue);
            direccionLabel.text(direccionValue);
            telefonoLabel.text(telefonoValue);
            correoLabel.text(correoValue);

            nombreInput.hide();
            nombreLabel.show();

            apellidoInput.hide();
            apellidoLabel.show();

            dniInput.hide();
            dniLabel.show();

            direccionInput.hide();
            direccionLabel.show();

            telefonoInput.hide();
            telefonoLabel.show();

            correoInput.hide();
            correoLabel.show();
            
            saveButton.hide();
            editButton.show();
        });
    });
});