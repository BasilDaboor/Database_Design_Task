document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const studentId = this.getAttribute('data-id');

            if (confirm('Are you sure you want to delete this student?')) {
                fetch('deleteStudent.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: studentId })
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    location.reload();
                })
                .catch(error => console.error('Error:', error));
            }
        });
    });


    const editButtons = document.querySelectorAll('.edit');
        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const displayData = e.target.parentElement.parentElement;
                displayData.classList.toggle('hidden');
                const editData = e.target.parentElement.parentElement.nextElementSibling;
                editData.classList.toggle('hidden');
              
            });
        });

        const cancelButtons = document.querySelectorAll('.cancel');
        cancelButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                const displayData = e.target.parentElement.parentElement;
                displayData.classList.toggle('hidden');
                const editData = e.target.parentElement.parentElement.previousElementSibling;
                editData.classList.toggle('hidden');
                
                

            });
        });

        





});

