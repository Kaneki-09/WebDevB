document.addEventListener('DOMContentLoaded', function() {
    const countdownElements = document.querySelectorAll('.countdown');

    countdownElements.forEach(function(element) {
        const revealDateStr = element.dataset.revealDate;
        const revealDate = new Date(revealDateStr).getTime();

        if (isNaN(revealDate)) {
            element.innerHTML = '日付エラー';
            return;
        }

        const interval = setInterval(function() {
            const now = new Date().getTime();
            const distance = revealDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));

            if (distance < 0) {
                clearInterval(interval);
                element.innerHTML = "公開されました！";
            } else {
                element.innerHTML = days + "日";
            }
        }, 1000);
    });
});