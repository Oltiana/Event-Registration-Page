document.getElementById('forgetPasswordForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const email = document.getElementById('email').value.trim();

    if (!email) {
        alert('Ju lutem shkruani email-in tuaj.');
        return;
    }

    const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
    if (!emailPattern.test(email)) {
        alert('Ju lutem shkruani një email të vlefshëm.');
        return;
    }

    alert('Udhëzimet për rivendosjen e fjalëkalimit u dërguan me sukses!');
    this.submit(); 
});