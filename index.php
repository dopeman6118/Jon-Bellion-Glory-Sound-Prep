<!doctype html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Glory Sound Prep</title>
    <style>
      /* CSS variables */
      :root {
        --surface: rgba(255, 255, 255, 0.06); /* translucent section background */
        --text: #f8fafc; /* page text color */
        --radius: 16px; /* consistent border radius */
      }

      /* Base / Layout */
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

      /* Navbar */
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

      /* Sections */
      .section {
        background: var(--surface);
        border-radius: var(--radius);
        padding: 28px;
        margin-top: 18px;
        scroll-margin-top: 96px; /* compensates for fixed header */
      }

      /* Tracks / Media */
      .tracks { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; align-items: start; }
      .album-art { width: 100%; max-width: 320px; border-radius: 12px; }
      audio { width: 100%; max-width: 520px; border-radius: 12px; }
      .track-list li { cursor: pointer; }

      /* Lyrics box */
      .lyrics {
        width: 100%;
        max-width: 560px;
        background: rgba(255,255,255,0.02);
        padding: 12px;
        border-radius: 12px;
        overflow-y: scroll;
        max-height: 220px;
      }
      .lyrics-heading { font-weight: 600; margin-bottom: 8px; }
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
      <section id="top" class="section">
        <img src="Glory Sound Prep.png" alt="Album art" class="album-art">
        <h1>Glory Sound Prep</h1>
      </section>

      <section id="about" class="section">
        <h1>About</h1>
        <p>Glory Sound Prep (2018), the second studio album by singer-songwriter and producer Jon Bellion, is a deeply personal and introspective exploration of fame, faith, and the realities of human connection in the digital age. The album is often characterized by its vulnerability and its rejection of the &quot;digital self,&quot; prioritizing authentic life experiences over curated online personas.</p>
        <ul>
          <li>Album: Glory Sound Prep</li>
          <li>Artist: Jon Bellion</li>
          <li>Year: 2018</li>
        </ul>
      </section>

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

    <!-- Script: track handling -->
    <script>
      // simple track map — maps displayed title -> filenames
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

      // helper: escape HTML special chars so lyrics display safely
      function escapeHtml(s) {
        return s.replace(/&/g, '&amp;').replace(/</g, '&lt;');
      }

      // change the audio source and load lyrics for the chosen track
      function setTrack(trackName) {
        var track = trackData[trackName];
        var player = document.getElementById('player');
        if (track && track.audio) {
          player.src = track.audio;
          try { player.play(); } catch (e) { /* ignore autoplay errors */ }
        }

        if (track && track.lyrics) {
          loadLyrics(track.lyrics);
        } else {
          document.getElementById('lyricsContent').textContent = 'Lyrics unavailable.';
        }
      }

      // load a lyrics text file and display it
      // converts newlines to <br> so the text keeps line breaks
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