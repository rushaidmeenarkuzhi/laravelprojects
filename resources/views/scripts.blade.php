
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const deleteButtons = document.querySelectorAll('.delete-profile');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const profileId = this.getAttribute('data-profile-id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('delete') }}/" + profileId;
                    }
                });
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const togglePasswordButton = document.getElementById('togglePassword');

        togglePasswordButton.addEventListener('click', function () {
            // Toggle the password input type between 'password' and 'text'
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';

            // Change the icon based on the input type
            const iconClass = passwordInput.type === 'password' ? 'fas fa-eye' : 'fas fa-eye-slash';
            togglePasswordButton.innerHTML = `<i class="${iconClass}"></i>`;
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('saveButton').addEventListener('click', function () {
            // Your existing form submission logic goes here

            // After successful form submission, display SweetAlert
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your work has been saved",
                showConfirmButton: false,
                timer: 1500
            });
        });
    });
</script>