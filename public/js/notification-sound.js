window.addEventListener('filament-notifications::notification-sent', (event) => {
    console.log('Filament notification received')
    if (!canPlaySound) return

    setTimeout(() => {
        new Audio('/sounds/notification.mp3').play().catch(() => { })
    }, 300)
})