<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Glory Sound Prep</title>
    <style>
      /* CSS VARIABLES & DESIGN SYSTEM */
      :root {
        --surface: rgba(255, 255, 255, 0.06);
        --text: #f8fafc;
        --radius: 16px;
      }

      /* BASE LAYOUT */
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

      /* NAVBAR */
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

      /* PAGE SECTIONS */
      .section {
        background: var(--surface);
        border-radius: var(--radius);
        padding: 28px;
        margin-top: 18px;
        scroll-margin-top: 96px; /* compensates for fixed header */
      }

      /* TRACKS & MEDIA (ALBUM PLAYER) */
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

      /* LYRICS DISPLAY */
      .lyrics {
        width: 100%;
        max-width: 560px;
        background: rgba(0, 0, 0, 0.5);
        padding: 12px;
        border-radius: 12px;
        overflow-y: scroll;
        max-height: 220px;
      }
      .lyrics-heading { font-weight: 600; margin-bottom: 8px; }
      /* MAP CONTAINER */
      .map-container {
        width: 100%;
        max-width: 560px;
        height: 320px;
        border-radius: 12px;
        overflow: hidden;
        flex: 1;
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
      </nav>
    </header>

    <main class="site">
      <!-- HOME SECTION: Album title + Map + Album art -->
      <section id="top" class="section">
        <h1>Glory Sound Prep</h1>
        <div class="top-content">
          <img src="Glory Sound Prep.png" alt="Album art" class="album-art">
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
              <li onclick="setTrack('Conversations With My Wife')">Conversations With My Wife</li>
              <li onclick="setTrack('JT')">JT</li>
              <li onclick="setTrack('Let\'s Begin (feat. Roc Marciano, RZA, B.Keyz & Travis Mendes)')">Let's Begin (feat. Roc Marciano, RZA, B.Keyz &amp; Travis Mendes)</li>
              <li onclick="setTrack('Stupid Deep')">Stupid Deep</li>
              <li onclick="setTrack('The Internet')">The Internet</li>
              <li onclick="setTrack('Blu')">Blu</li>
              <li onclick="setTrack('Adult Swim (feat. Tuamie)')">Adult Swim (feat. Tuamie)</li>
              <li onclick="setTrack('Couples Retreat')">Couples Retreat</li>
              <li onclick="setTrack('Cautionary Tales')">Cautionary Tales</li>
              <li onclick="setTrack('Mah\'s Joint (feat. Quincy Jones)')">Mah's Joint (feat. Quincy Jones)</li>
            </ol>
          </div>

          <div class="media">
            <audio id="player" controls>
              <source src="Stupid Deep.mp3" type="audio/mpeg">
            </audio>

            <div id="lyrics" class="lyrics" aria-live="polite">
              <div class="lyrics-heading">Lyrics</div>
                <div id="lyricsContent">Lyrics unavailable.</div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- JAVASCRIPT: Audio player + Lyrics loader -->
    <script>
      // TRACK DATA - maps displayed titles to audio and lyrics filenames
      var trackData = {
        "Conversations With My Wife": { audio: "Conversations with my Wife.mp3", lyrics: "Conversation with my Wife lyrics.txt" },
        "JT": { audio: "JT.mp3", lyrics: "JT lyrics.txt" },
        "Let's Begin (feat. Roc Marciano, RZA, B.Keyz & Travis Mendes)": { audio: "Let's Begin.mp3", lyrics: "Let's Begin lyrics.txt" },
        "Stupid Deep": { audio: "Stupid Deep.mp3", lyrics: "Stupid Deep lyrics.txt" },
        "The Internet": { audio: "The Internet.mp3", lyrics: "The Internet lyrics.txt" },
        "Blu": { audio: "Blu.mp3", lyrics: "Blu lyrics.txt" },
        "Adult Swim (feat. Tuamie)": { audio: "Adult Swim.mp3", lyrics: "Adult Swim lyrics.txt" },
        "Couples Retreat": { audio: "Couple's Retreat.mp3", lyrics: "Couples Retreat lyrics.txt" },
        "Cautionary Tales": { audio: "Cautionary Tales.mp3", lyrics: "Cautionary Tales lyrics.txt" },
        "Mah's Joint (feat. Quincy Jones)": { audio: "Mah's Joint.mp3", lyrics: "Mah's Joint lyrics.txt" }
      };

      // HELPER - escape HTML to prevent special chars from breaking display
      function escapeHtml(s) {
        return s.replace(/&/g, '&amp;').replace(/</g, '&lt;');
      }

      // MAIN PLAYER - when user clicks a track, play audio and load lyrics
      function setTrack(trackName) {
        var track = trackData[trackName];
        var player = document.getElementById('player');
        if (track && track.audio) {
          player.src = track.audio;
          try {
            player.play();
          } catch (e) {
            console.warn('Audio playback blocked or unavailable:', e);
          }
        }

        if (track && track.lyrics) {
          loadLyrics(track.lyrics);
        } else {
          document.getElementById('lyricsContent').textContent = 'Lyrics unavailable.';
        }
      }

      // LOAD LYRICS - fetch and display track lyrics from text files
      // converts newlines to <br> for proper formatting
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
    </script>
  </body>
</html>
