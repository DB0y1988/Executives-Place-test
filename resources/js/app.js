require('./bootstrap');

document.addEventListener("DOMContentLoaded", function(event) { 

  const btnDelete = document.querySelector('.bin-icon');
  const deleteForm = document.getElementById('form-delete-user');
  btnDelete.addEventListener('click', event => {
  	event.preventDefault();
  	deleteForm.submit();
  });

});
