<?php include('db.php'); include('nav.php'); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Главная — OBLADAET MERCH</title>
  
  <!-- PWA обязательные мета-теги -->
  <meta name="theme-color" content="#000000">
  <meta name="description" content="Официальный мерч рэпера OBLADAET. Players Club — стиль, уникальность и качество.">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-title" content="OBLADAET MERCH">
  
  <!-- Иконки -->
  <link rel="manifest" href="/manifest.json">
  <link rel="icon" href="/icons/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/icons/icon-192x192.png">
  <link rel="shortcut icon" href="/icons/favicon.ico">
  
  <!-- Основные стили -->
  <link rel="stylesheet" href="style.css">

  <style>
    /* Стили для кнопки установки PWA */
    .install-btn {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #4CAF50;
      color: white;
      padding: 12px 20px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      font-size: 1rem;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      display: none;
      z-index: 1000;
      transition: background-color 0.3s ease;
    }
    .install-btn:hover {
      background: #45a049;
    }

    /* Немного адаптивности */
    @media (max-width: 600px) {
      .container {
        padding: 10px;
      }
      h1 {
        font-size: 1.8rem;
      }
      .images-main figure {
        margin-bottom: 15px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Добро пожаловать в Players Club</h1>
    <p class="p-main">
      <strong>Официальный мерч рэпера OBLADAET.</strong><br><br>
      <strong>Players Club</strong> был создан в 2021 году и уже за такой маленький период доминирует над многими другими крупными брендами. Вещи, которые выпускаются уже год отличаются своим стилем, особенностью и редкостью. Название «Players» родилось в честь большого альбома OBLADAET - «Players Club», который стал самым хайповым и прослушиваемым у артиста. <br><br>

      <strong>Основание и концепция</strong><br>
      Идея Players Club родилась из желания создать одежду, которая сочетает в себе элементы уличной моды, спортивного шика и лёгкой эстетики 90-х. Название бренда отсылает к атмосфере закрытых клубов, где собираются «игроки» — люди, уверенные в себе и знающие цену своему стилю.<br><br>

      <strong>Развитие и коллаборации</strong><br>
      Вещи не перепродаются и выпускаются в ограниченном количестве, это и делает каждый дроп очень уникальным. Коллекция "MUT4NT SEASON" стала, наверное, самой нашумевшей и ожидающей в истории бренда.<br><br>

      За год существования «Players» уже готовы в ближайшее время выпускать новую коллекцию с зарубежным артистом Unknown T.<br><br>

      <strong>Философия бренда</strong><br>
      Players Club не просто продаёт одежду — он создаёт образ жизни. Девиз бренда можно выразить фразой: <em>«Ты либо в клубе, либо нет».</em> Это сообщество тех, кто не боится выделяться и чувствует себя частью особой культуры.<br><br>

      <strong>Players Club сегодня</strong><br>
      «Players» один из самых стильных брендов в России. Он прогрессивно и без остановок развивается. В будущем нас ждёт всё больше нового и интересного.<br><br>

      Players Club от «Обладает» — это пример того, как локальный бренд смог создать узнаваемую эстетику и завоевать свою аудиторию. Его история продолжается, и, возможно, в будущем нас ждёт ребрендинг или возвращение с новыми коллекциями.<br><br>

      🔥 <strong>«Once a player, always a player»</strong> 🔥
    </p>
    <div class="images-main">
      <figure>
        <img src="img/Главная.png" class="img_1-main" alt="Коллаборация c KAPPA">
        <figcaption>Коллаборация PLAYERS CLUB c KAPPA</figcaption>
      </figure>
      <figure>
        <img src="img/Главная2.png" class="img_2-main" alt="Season 2025">
        <figcaption>Последний вышедший на данный момент альбом OBLADAET</figcaption>
        <figcaption>Альбом под названием "735"</figcaption>
        <figcaption>Цифры 735 — это не только дата выхода этого альбома (07.03.2025), но и важный код для артиста</figcaption>
        <figcaption>Они фигурируют в названии его собственного бренда «P7AY3R5 CLUB».</figcaption>
      </figure>
    </div>
  </div>

  <!-- Кнопка установки PWA -->
  <button id="installBtn" class="install-btn" title="Установить приложение">Установить</button>

  <script>
    // Регистрация Service Worker
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('/serviceworker.js')
          .then(registration => console.log('ServiceWorker зарегистрирован:', registration.scope))
          .catch(error => console.log('Ошибка регистрации ServiceWorker:', error));
      });
    }

    // Обработка события beforeinstallprompt
    let deferredPrompt;
    const installBtn = document.getElementById('installBtn');

    window.addEventListener('beforeinstallprompt', (e) => {
      e.preventDefault(); // Предотвращаем автоматическое появление подсказки
      deferredPrompt = e;
      installBtn.style.display = 'block'; // Показываем кнопку установки
    });

    installBtn.addEventListener('click', async () => {
      if (deferredPrompt) {
        deferredPrompt.prompt(); // Показываем диалог установки
        const { outcome } = await deferredPrompt.userChoice;
        if (outcome === 'accepted') {
          console.log('Пользователь принял установку PWA');
        } else {
          console.log('Пользователь отклонил установку PWA');
        }
        deferredPrompt = null;
        installBtn.style.display = 'none'; // Скрываем кнопку после выбора
      }
    });

    window.addEventListener('appinstalled', () => {
      console.log('PWA приложение установлено');
      installBtn.style.display = 'none';
      deferredPrompt = null;
    });

    // Скрываем кнопку установки, если сайт запущен как PWA
    if (window.matchMedia('(display-mode: standalone)').matches) {
      installBtn.style.display = 'none';
    }
  </script>
</body>
</html>
