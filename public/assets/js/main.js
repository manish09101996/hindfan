/**
 * Hindfan.com - Modern JavaScript Interactive Controller
 */

document.addEventListener('DOMContentLoaded', function () {
  // 1. Sticky Navbar shadow on scroll
  const navbar = document.querySelector('.navbar-modern');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        navbar.classList.add('is-scrolled');
      } else {
        navbar.classList.remove('is-scrolled');
      }
    });
  }

  // 2. Auto-dismiss flash alerts
  const flashAlerts = document.querySelectorAll('.alert-dismissible');
  flashAlerts.forEach((alert) => {
    setTimeout(() => {
      try {
        const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
        bsAlert.close();
      } catch (e) {
        alert.style.display = 'none';
      }
    }, 6000);
  });

  // 3. Project detail gallery thumbnail click switcher
  const mainGalleryImage = document.getElementById('mainGalleryImage');
  const galleryThumbnails = document.querySelectorAll('.gallery-thumbnail-item');
  if (mainGalleryImage && galleryThumbnails.length > 0) {
    galleryThumbnails.forEach((thumb) => {
      thumb.addEventListener('click', function () {
        const newSrc = this.getAttribute('data-image-src');
        const newAlt = this.getAttribute('data-image-alt') || '';
        if (newSrc) {
          mainGalleryImage.src = newSrc;
          mainGalleryImage.alt = newAlt;
          galleryThumbnails.forEach((t) => t.classList.remove('active'));
          this.classList.add('active');
        }
      });
    });
  }

  // 4. Admin Project Form: Auto-generate slug from title
  const titleInput = document.getElementById('projectTitleInput');
  const slugInput = document.getElementById('projectSlugInput');
  if (titleInput && slugInput) {
    let slugManuallyEdited = slugInput.value.length > 0;

    slugInput.addEventListener('input', function () {
      slugManuallyEdited = true;
    });

    titleInput.addEventListener('input', function () {
      if (!slugManuallyEdited) {
        const slug = titleInput.value
          .toLowerCase()
          .trim()
          .replace(/[^a-z0-9\s-]/g, '')
          .replace(/[\s-]+/g, '-')
          .replace(/^-+|-+$/g, '');
        slugInput.value = slug;
      }
    });
  }

  // 5. Admin Thumbnail Preview
  const thumbInput = document.getElementById('thumbnailFileInput');
  const thumbPreview = document.getElementById('thumbnailPreviewBox');
  if (thumbInput && thumbPreview) {
    thumbInput.addEventListener('change', function () {
      if (this.files && this.files[0]) {
        const file = this.files[0];
        if (file.type.match('image.*')) {
          const reader = new FileReader();
          reader.onload = function (e) {
            thumbPreview.innerHTML = `
              <div class="image-preview-card" style="width: 140px; height: 140px;">
                <img src="${e.target.result}" alt="Thumbnail Preview" style="width: 100%; height: 100%; object-fit: cover;">
                <span class="badge bg-success position-absolute bottom-0 start-0 m-1">New</span>
              </div>
            `;
          };
          reader.readAsDataURL(file);
        }
      }
    });
  }

  // 6. Admin Multiple Gallery Images Preview
  const galleryInput = document.getElementById('galleryFileInput');
  const galleryPreview = document.getElementById('galleryPreviewContainer');
  if (galleryInput && galleryPreview) {
    galleryInput.addEventListener('change', function () {
      galleryPreview.innerHTML = '';
      if (this.files) {
        Array.from(this.files).forEach((file, index) => {
          if (file.type.match('image.*')) {
            const reader = new FileReader();
            reader.onload = function (e) {
              const card = document.createElement('div');
              card.className = 'image-preview-card';
              card.innerHTML = `
                <img src="${e.target.result}" alt="Preview ${index + 1}">
                <span class="badge bg-primary position-absolute bottom-0 start-0 m-1 font-monospace" style="font-size: 0.65rem;">#${index + 1}</span>
              `;
              galleryPreview.appendChild(card);
            };
            reader.readAsDataURL(file);
          }
        });
      }
    });
  }
});

// Helper for deletion confirmation
function confirmDeletion(formId, message) {
  if (confirm(message || 'Are you sure you want to permanently delete this item? This action cannot be undone.')) {
    document.getElementById(formId).submit();
  }
}
