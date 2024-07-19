function showConfirmDeleteModal(formSelector, title = 'Apakah kamu yakin?', text = null) {
    if (document.querySelectorAll(formSelector).length > 0) {
        document.querySelectorAll(formSelector).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                var nameData = form.getAttribute('data-name');
                Swal.fire({
                    title: title,
                    text: text != null ? text + nameData : "Ingin menghapus : '" + nameData + "'?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal",
                    background: 'var(--bs-body-bg)',
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    }
}
