function confirmDelete(id) {
  console.log(id);

  var confirmar = confirm("Deseja realmente excluir essa mensagem?");

  if (confirmar == true) {
    window.location.href = "./classes/msg/deleteMsg.php?id=" + id;
  }
}
