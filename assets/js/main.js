// const tipo_user = document.getElementById('tipoUsuario');
const user = document.querySelector('.tipoUsuario');
const consultorio = document.querySelector('.consultorio');
const especialidad = document.querySelector('.especialidad');

user.addEventListener('change',hideOptionMedic);

function hideOptionMedic(){
    const resultado = document.querySelector('.resultado');
   if(user.value == 1){
        consultorio.classList.toggle('inactive');
        especialidad.classList.toggle('inactive');
        
        resultado.textContent = 'Registro de Paciente';

   }else{
    consultorio.classList.toggle('inactive');
    especialidad.classList.toggle('inactive');
    resultado.textContent = 'Registro de Médico';

   }

}