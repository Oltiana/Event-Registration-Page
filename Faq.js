const questions = document.querySelectorAll('.question');
questions.forEach((question) => {
    question.addEventListener('click', () => {
        const answer = question.nextElementSibling; 
        const icon = question.querySelector('.icon');
        
        if (answer.style.display === 'block') {
            answer.style.display = 'none';
            icon.style.transform = 'rotate(0deg)'; 
        } else {
            answer.style.display = 'block';
            icon.style.transform = 'rotate(45deg)';
        }
    });
});