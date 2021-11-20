function deleteItem(param) {
    const response = confirm("Deseja apagar esse item?");
    if(response) return window.location.href = param;
}