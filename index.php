<?php
// handle POST and redirect with a simple confirmation flag
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['message'])) {
  $base = strtok($_SERVER['REQUEST_URI'], '?');
  header('Location: ' . $base . '?sent=1#contacts');
  exit;
}

$message = '';
if (isset($_GET['sent']) && $_GET['sent'] === '1') {
  $message = '<p style="margin-top: 24px; font-weight: 600;">Thanks! Your message was received.</p>';
}
?>

<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Glory Sound Prep</title>
    <style>
      :root {
        --surface: rgba(255, 255, 255, 0.06);
        --text: #f8fafc;
        --radius: 16px;
      }
      * { box-sizing: border-box; }
      body {
        margin: 0;
        min-height: 100vh;
        font-family: Inter, system-ui, sans-serif;
        background: linear-gradient(180deg, rgba(12,40,58,0.9), rgba(13,67,89,0.95)), url('Glory Sound Prep.png') center/cover no-repeat;
        background-attachment: fixed;
        color: var(--text);
      }
      .site { max-width: 1100px; margin: 0 auto; padding: 100px 20px; }

      .navbar {
        position: fixed;
        inset: 0 0 auto 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 14px 20px;
        background: #062d40;
        color: var(--text);
        z-index: 50;
      }
      .brand { font-weight: 700; letter-spacing: 0.06em; }
      nav.nav-list { display: flex; gap: 18px; }
      a.nav-link { color: var(--text); text-decoration: none; }

      .section {
        background: var(--surface);
        border-radius: var(--radius);
        padding: 28px;
        margin-top: 18px;
        scroll-margin-top: 96px; /* compensates for fixed header */
      }

      .tracks { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start; }
      .album-art { width: 100%; max-width: 320px; border-radius: 12px; }
      .top-content { display: flex; gap: 24px; align-items: flex-start; }
      audio { width: 100%; max-width: 520px; border-radius: 12px; }
      .track-list ol { margin: 0; padding-left: 18px; }
      .track-list li {
        cursor: pointer;
        line-height: 1.7;
        padding: 6px 0;
        margin-bottom: 6px;
      }
      .track-list li:last-child { margin-bottom: 0; }

      .lyrics {
        width: 100%;
        max-width: 560px;
        background: rgba(0, 0, 0, 0.5);
        padding: 12px;
        border-radius: 12px;
        overflow-y: scroll;
        max-height: 220px;
      }

      .lyrics-heading {
        font-weight: 600;
        margin-bottom: 8px;
      }

      .map-container {
        width: 100%;
        height: 380px;
        border-radius: 12px;
        overflow: hidden;
      }

      .contacts-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
        align-items: start;
      }

      form {
        display: flex;
        flex-direction: column;
        gap: 16px;
      }

      form div {
        display: flex;
        flex-direction: column;
        gap: 8px;
      }

      label {
        font-weight: 600;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.05em;
      }

      input[type="text"],
      input[type="email"],
      
      textarea {
        padding: 12px;
        background: rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        color: var(--text);
        font-family: inherit;
        font-size: 14px;
      }

      input[type="text"]:focus,
      input[type="email"]:focus,

      textarea:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.5);
        background: rgba(0, 0, 0, 0.5);
      }

      input[type="submit"] {
        padding: 12px 24px;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 8px;
        color: var(--text);
        font-weight: 600;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 14px;
        transition: all 0.3s ease;
      }

      input[type="submit"]:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
      }

    </style>
  </head>
  <body>
    <!-- Navbar / Header -->
    <header class="navbar">
      <div class="brand">Jon Bellion</div>
      <nav class="nav-list" role="navigation">
        <a class="nav-link" href="#top">Home</a>
        <a class="nav-link" href="#about">About</a>
        <a class="nav-link" href="#tracks">Tracks</a>
        <a class="nav-link" href="#contacts">Contacts</a>
      </nav>
    </header>

    <main class="site">
      <!-- HOME SECTION: Album title + Map + Album art -->
      <section id="top" class="section">
        <div class="top-content">
          <img src="Glory Sound Prep.png" alt="Album art" class="album-art">
        </div>
        <h1>Glory Sound Prep</h1>
      </section>

      <!-- ABOUT SECTION: Album info -->
      <section id="about" class="section">
        <h1>About</h1>
        <p>Glory Sound Prep (2018), the second studio album by singer-songwriter and producer Jon Bellion, is a deeply personal and introspective exploration of fame, faith, and the realities of human connection in the digital age. The album is often characterized by its vulnerability and its rejection of the &quot;digital self,&quot; prioritizing authentic life experiences over curated online personas.</p>
        <ul>
          <li>Album: Glory Sound Prep</li>
          <li>Artist: Jon Bellion</li>
          <li>Year: 2018</li>
        </ul>
      </section>

      <!-- TRACKS SECTION: Audio player + Track list + Lyrics viewer -->
      <section id="tracks" class="section">
        <h1>Tracks</h1>
        <div class="tracks">
          <div class="track-list">
            <h2>Track list</h2>
            <ol>
              <li onclick="setTrack(this)" data-audio="Conversations with my Wife.mp3" data-lyrics="Conversation with my Wife lyrics.txt">Conversations With My Wife</li>
              <li onclick="setTrack(this)" data-audio="JT.mp3" data-lyrics="JT lyrics.txt">JT</li>
              <li onclick="setTrack(this)" data-audio="Let's Begin.mp3" data-lyrics="Let's Begin lyrics.txt">Let's Begin (feat. Roc Marciano, RZA, B.Keyz &amp; Travis Mendes)</li>
              <li onclick="setTrack(this)" data-audio="Stupid Deep.mp3" data-lyrics="Stupid Deep lyrics.txt">Stupid Deep</li>
              <li onclick="setTrack(this)" data-audio="The Internet.mp3" data-lyrics="The Internet lyrics.txt">The Internet</li>
              <li onclick="setTrack(this)" data-audio="Blu.mp3" data-lyrics="Blu lyrics.txt">Blu</li>
              <li onclick="setTrack(this)" data-audio="Adult Swim.mp3" data-lyrics="Adult Swim lyrics.txt">Adult Swim (feat. Tuamie)</li>
              <li onclick="setTrack(this)" data-audio="Couple's Retreat.mp3" data-lyrics="Couples Retreat lyrics.txt">Couples Retreat</li>
              <li onclick="setTrack(this)" data-audio="Cautionary Tales.mp3" data-lyrics="Cautionary Tales lyrics.txt">Cautionary Tales</li>
              <li onclick="setTrack(this)" data-audio="Mah's Joint.mp3" data-lyrics="Mah's Joint lyrics.txt">Mah's Joint (feat. Quincy Jones)</li>
            </ol>
          </div>

          <div class="media">
            <audio id="player" controls src="Stupid Deep.mp3"></audio>

            <div id="lyrics" class="lyrics" aria-live="polite">
              <div class="lyrics-heading">Lyrics</div>
                <div id="lyricsContent">Lyrics unavailable.</div>
            </div>
          </div>
        </div>
      </section>

      <!-- CONTACTS SECTION: Contact form with PHP backend -->
      <section id="contacts" class="section">
        <h1>Contacts</h1>
        <div class="contacts-grid">
          <div>
            <form method="POST" action="">
              <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
              </div>
              <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
              </div>
              <div>
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" required></textarea>
              </div>
              <input type="submit" value="Send Message">
            </form>
            <?php echo $message; ?>
          </div>
          <div class="map-container">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48322.2928470982!2d-73.37847649094331!3d40.802844642445194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e82e8d90aedb1f%3A0xdff32f1f71fa55c7!2sDix%20Hills%2C%20NY%2C%20USA!5e0!3m2!1sen!2sph!4v1782251942218!5m2!1sen!2sph"
              width="100%"
              height="100%"
              style="border:0;"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="strict-origin-when-cross-origin"
            ></iframe>
          </div>
        </div>
      </section>
    </main>

    <!-- JAVASCRIPT: Audio player + Lyrics loader -->
    <script>
      // helper: escape HTML
      function escapeHtml(s) {
        return s.replace(/&/g, '&amp;').replace(/</g, '&lt;');
      }

      // main player: set track and load lyrics
      function setTrack(element) {
        var audioFile = element.getAttribute('data-audio');
        var lyricsFile = element.getAttribute('data-lyrics');
        var player = document.getElementById('player');

        if (audioFile) {
          player.src = audioFile;
          try {
            player.play();
          } catch (e) {
            console.warn('Audio playback blocked or unavailable:', e);
          }
        }

        if (lyricsFile) {
          loadLyrics(lyricsFile);
        } else {
          document.getElementById('lyricsContent').textContent = 'Lyrics unavailable.';
        }
      }

      // load lyrics from text file and display
      function loadLyrics(fileName) {
        fetch(fileName)
          .then(function(response) {
            if (!response.ok) throw 'not found';
            return response.text();
          })
          .then(function(text) {
            var safe = escapeHtml(text);
            document.getElementById('lyricsContent').innerHTML = safe.replace(/\n/g, '<br>');
          })
          .catch(function() {
            document.getElementById('lyricsContent').textContent = 'Lyrics unavailable.';
          });
      }

      if (window.location.search.indexOf('sent=1') !== -1) {
        window.history.replaceState(null, '', window.location.pathname + '#contacts');
      }
    </script>
  </body>
</html>