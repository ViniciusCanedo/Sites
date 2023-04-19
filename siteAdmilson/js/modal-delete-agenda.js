function confirmDeleteAgenda(id) {
  console.log(id);

  var confirmar = confirm("Deseja realmente excluir esse agendamento?");

  if (confirmar == true) {
    window.location.href = "./classes/agenda/deleteAgenda.php?id=" + id;
  }
}
