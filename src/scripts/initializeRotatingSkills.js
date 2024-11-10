// rotating-skills.js
export function initializeRotatingSkills(skills) {
    const VISIBLE_SKILLS = 6;
    let currentIndex = 0;
    
    function updateSkills() {
      const skillsContainer = document.querySelector('.skills-grid');
      if (!skillsContainer) return;
  
      // Calcular qué skills mostrar
      const visibleSkills = [];
      for (let i = 0; i < VISIBLE_SKILLS; i++) {
        const index = (currentIndex + i) % skills.length;
        visibleSkills.push(skills[index]);
      }
  
      // Añadir clase para la animación de fade out
      skillsContainer.classList.add('transitioning');
  
      // Esperar a que termine la animación de fade out
      setTimeout(() => {
        // Actualizar el contenido
        skillsContainer.innerHTML = visibleSkills.map(skill => `
          <div class="flex flex-col items-center p-3 bg-white dark:bg-gray-800 rounded-xl hover:scale-105 transition-transform">
            <Icon name="${skill.icon}" class="w-10 h-10 dark:text-white" />
            <span class="mt-2 text-sm text-gray-600 dark:text-gray-300">${skill.name}</span>
          </div>
        `).join('');
  
        // Remover clase de transición para fade in
        skillsContainer.classList.remove('transitioning');
        
        // Incrementar el índice
        currentIndex = (currentIndex + 1) % skills.length;
      }, 300);
    }
  
    // Iniciar la rotación
    updateSkills();
    setInterval(updateSkills, 3000);
  }