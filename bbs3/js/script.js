function updateCountdowns() {
    document.querySelectorAll('.countdown').forEach(countdown => {
        const targetDate = new Date(countdown.dataset.date);
        const now = new Date();
        const diff = targetDate - now;

        if (diff > 0) {
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            countdown.innerHTML = `あと${days}日${hours}時間`;
        } else {
            countdown.innerHTML = '公開中！';
        }
    });
}

setInterval(updateCountdowns, 1000);
updateCountdowns();

function shareMessage() {
    navigator.clipboard.writeText(window.location.href);
    alert('リンクをコピーしました！');
}
