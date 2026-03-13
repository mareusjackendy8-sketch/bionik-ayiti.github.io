<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIONIK AYITI - Technologies Avancées</title>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300;400;600;700&family=Rajdhani:wght@400;500;600&family=Source+Code+Pro&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue-electric: #0066FF;
            --green-neon: #00FF99;
            --black-deep: #0A0A0A;
            --white-cyber: #F0F0F0;
            --purple-holographic: #8A2BE2;
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Exo 2', sans-serif;
            background-color: var(--black-deep);
            color: var(--white-cyber);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Curseur personnalisé */
        .cursor {
            position: fixed;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--green-neon);
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: difference;
            transition: transform 0.2s ease;
        }

        .cursor-follower {
            position: fixed;
            width: 40px;
            height: 40px;
            border: 2px solid var(--blue-electric);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9998;
            transition: transform 0.15s ease;
        }

        /* Navigation */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10, 10, 10, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 102, 255, 0.2);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--white-cyber);
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .logo span {
            color: var(--green-neon);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            color: var(--white-cyber);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            padding: 5px 0;
            transition: var(--transition);
        }

        .nav-links a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--green-neon);
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--green-neon);
        }

        .nav-links a:hover:after {
            width: 100%;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 0 50px;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
        }

        .hero-content {
            text-align: center;
            z-index: 10;
            max-width: 800px;
        }

        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            background: linear-gradient(90deg, var(--blue-electric), var(--green-neon));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            animation: textGlow 3s infinite alternate;
        }

        @keyframes textGlow {
            0% { text-shadow: 0 0 10px rgba(0, 102, 255, 0.5); }
            100% { text-shadow: 0 0 20px rgba(0, 255, 153, 0.8); }
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            font-family: 'Rajdhani', sans-serif;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 40px;
            background: transparent;
            border: 2px solid var(--green-neon);
            color: var(--green-neon);
            text-decoration: none;
            font-weight: 600;
            border-radius: 30px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .cta-button:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--green-neon);
            transition: var(--transition);
            z-index: -1;
        }

        .cta-button:hover {
            color: var(--black-deep);
        }

        .cta-button:hover:before {
            left: 0;
        }

        /* Section Services */
        .services {
            padding: 100px 50px;
            background: rgba(0, 0, 0, 0.7);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
            font-size: 2.5rem;
            position: relative;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 3px;
            background: var(--blue-electric);
        }

        .hex-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hex-card {
            background: rgba(20, 20, 30, 0.8);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            transition: var(--transition);
            border: 1px solid rgba(0, 102, 255, 0.3);
            position: relative;
            overflow: hidden;
        }

        .hex-card:before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, var(--blue-electric), var(--purple-holographic), var(--green-neon));
            z-index: -1;
            border-radius: 12px;
            opacity: 0;
            transition: var(--transition);
        }

        .hex-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 102, 255, 0.3);
        }

        .hex-card:hover:before {
            opacity: 1;
        }

        .hex-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: var(--green-neon);
        }

        .hex-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .hex-card p {
            font-family: 'Rajdhani', sans-serif;
            color: rgba(240, 240, 240, 0.8);
        }

        /* Section Technologie */
        .technology {
            padding: 100px 50px;
            position: relative;
        }

        .timeline {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
        }

        .timeline:before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background: var(--blue-electric);
            transform: translateX(-50%);
        }

        .timeline-item {
            margin-bottom: 50px;
            position: relative;
            width: 50%;
            padding: 20px 40px;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-content {
            background: rgba(20, 20, 30, 0.8);
            padding: 20px;
            border-radius: 10px;
            border: 1px solid rgba(0, 102, 255, 0.3);
            position: relative;
        }

        .timeline-content:after {
            content: '';
            position: absolute;
            top: 20px;
            width: 20px;
            height: 20px;
            background: var(--green-neon);
            border-radius: 50%;
        }

        .timeline-item:nth-child(odd) .timeline-content:after {
            right: -40px;
        }

        .timeline-item:nth-child(even) .timeline-content:after {
            left: -40px;
        }

        .timeline-content h3 {
            color: var(--green-neon);
            margin-bottom: 10px;
        }

        /* Section Contact */
        .contact {
            padding: 100px 50px;
            background: rgba(0, 0, 0, 0.7);
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(20, 20, 30, 0.8);
            padding: 40px;
            border-radius: 10px;
            border: 1px solid rgba(0, 102, 255, 0.3);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--green-neon);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            background: rgba(10, 10, 10, 0.8);
            border: 1px solid rgba(0, 102, 255, 0.3);
            border-radius: 5px;
            color: var(--white-cyber);
            font-family: 'Rajdhani', sans-serif;
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--green-neon);
            box-shadow: 0 0 10px rgba(0, 255, 153, 0.3);
        }

        .submit-btn {
            background: transparent;
            border: 2px solid var(--green-neon);
            color: var(--green-neon);
            padding: 12px 30px;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
            width: 100%;
        }

        .submit-btn:hover {
            background: var(--green-neon);
            color: var(--black-deep);
        }

        /* Footer */
        footer {
            padding: 30px 50px;
            text-align: center;
            border-top: 1px solid rgba(0, 102, 255, 0.3);
        }

        .social-links {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .social-links a {
            display: inline-block;
            margin: 0 15px;
            color: var(--white-cyber);
            font-size: 1.5rem;
            transition: var(--transition);
        }

        .social-links a:hover {
            color: var(--green-neon);
            transform: translateY(-5px);
        }

        /* Mode Nuit/Jour */
        .theme-toggle {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--blue-electric);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1000;
            box-shadow: 0 0 15px rgba(0, 102, 255, 0.5);
            transition: var(--transition);
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
            }
            
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.2rem;
            }
            
            .services, .technology, .contact {
                padding: 60px 20px;
            }
            
            .timeline:before {
                left: 30px;
            }
            
            .timeline-item {
                width: 100%;
                left: 0 !important;
                padding-left: 70px;
                padding-right: 20px;
            }
            
            .timeline-content:after {
                left: -40px !important;
            }
        }
    </style>
</head>
<body>
    <!-- Curseurs personnalisés -->
    <div class="cursor"></div>
    <div class="cursor-follower"></div>

    <!-- Navigation -->
    <header>
        <a href="#" class="logo">BIONIK<span>AYITI</span></a>
        <ul class="nav-links">
            <li><a href="#accueil">Accueil</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#technologie">Technologie</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </header>

    <!-- Section Hero -->
    <section class="hero" id="accueil">
        <div id="particles-js"></div>
        <div class="hero-content">
            <h1>L'Avenir en Mouvement</h1>
            <p>Redéfinir les limites humaines, une innovation à la fois</p>
            <a href="#services" class="cta-button">Découvrir nos technologies</a>
        </div>
    </section>

    <!-- Section Services -->
    <section class="services" id="services">
        <h2 class="section-title">Nos Domaines d'Expertise</h2>
        <div class="hex-grid">
            <div class="hex-card">
                <div class="hex-icon">🦾</div>
                <h3>Prothèses Neuro-Contrôlables</h3>
                <p>Contrôle intuitif par la pensée grâce à nos interfaces cerveau-machine avancées.</p>
            </div>
            <div class="hex-card">
                <div class="hex-icon">🤖</div>
                <h3>Robotique Avancée</h3>
                <p>Solutions d'automatisation intelligente pour l'industrie et la santé.</p>
            </div>
            <div class="hex-card">
                <div class="hex-icon">💻</div>
                <h3>Développement Logiciel</h3>
                <p>Applications sur mesure utilisant les dernières technologies.</p>
            </div>
            <div class="hex-card">
                <div class="hex-icon">📱</div>
                <h3>Applications Web & Mobile</h3>
                <p>Expériences utilisateur immersives et innovantes.</p>
            </div>
        </div>
    </section>

    <!-- Section Technologie -->
    <section class="technology" id="technologie">
        <h2 class="section-title">Notre Approche Innovante</h2>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>Interface Neuronale Avancée</h3>
                    <p>Développement de systèmes de contrôle par la pensée avec un taux de précision de 99.7%.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>Robotique Collaborative</h3>
                    <p>Création de robots qui travaillent en harmonie avec les humains dans des environnements complexes.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>IA Adaptative</h3>
                    <p>Algorithmes auto-apprenants qui s'adaptent aux besoins spécifiques de chaque utilisateur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Contact -->
    <section class="contact" id="contact">
        <h2 class="section-title">Connectons-nous</h2>
        <form class="contact-form" action="contact.php" method="POST">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
            </div>
            <button type="submit" class="submit-btn">Envoyer le message</button>
        </form>
    </section>

    <!-- Footer -->
    <footer>
        <div class="social-links">
            <a href="#">📘</a>
            <a href="#">🐦</a>
            <a href="#">📸</a>
            <a href="#">💼</a>
        </div>
        <p>&copy; 2023 BIONIK AYITI. Tous droits réservés.</p>
    </footer>

    <!-- Bouton changement de thème -->
    <div class="theme-toggle">🌙</div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Curseur personnalisé
        const cursor = document.querySelector('.cursor');
        const cursorFollower = document.querySelector('.cursor-follower');

        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
            
            setTimeout(() => {
                cursorFollower.style.left = e.clientX + 'px';
                cursorFollower.style.top = e.clientY + 'px';
            }, 100);
        });

        // Animation des éléments au défilement
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.hex-card, .timeline-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(el);
        });

        // Particules en arrière-plan
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: "#00FF99" },
                shape: { type: "circle" },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: "#0066FF",
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: "none",
                    random: true,
                    straight: false,
                    out_mode: "out",
                    bounce: false
                }
            },
            interactivity: {
                detect_on: "canvas",
                events: {
                    onhover: { enable: true, mode: "repulse" },
                    onclick: { enable: true, mode: "push" },
                    resize: true
                }
            }
        });

        // Changement de thème
        const themeToggle = document.querySelector('.theme-toggle');
        themeToggle.addEventListener('click', () => {
            document.body.classList.toggle('light-theme');
            themeToggle.textContent = document.body.classList.contains('light-theme') ? '🌞' : '🌙';
        });

        // Ajout de la classe light-theme pour le style alternatif
        const style = document.createElement('style');
        style.textContent = `
            .light-theme {
                --black-deep: #F0F0F0;
                --white-cyber: #0A0A0A;
                background-color: var(--black-deep);
                color: var(--white-cyber);
            }
            
            .light-theme .hex-card,
            .light-theme .timeline-content,
            .light-theme .contact-form {
                background: rgba(240, 240, 240, 0.9);
                color: #0A0A0A;
            }
            
            .light-theme .form-control {
                background: rgba(255, 255, 255, 0.9);
                color: #0A0A0A;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>