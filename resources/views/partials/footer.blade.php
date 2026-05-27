{{-- resources/views/partials/footer.blade.php --}}

<footer class="av2-footer">
  <div class="container">
    <div class="row">

      <!-- Brand -->
      <div class="col-lg-4">
        <div class="footer-brand">
          <img src="{{ asset('images/footer_logo.png') }}" alt="Av2 agro" class="footer-logo">
          <p>
            av2agro is committed to delivering pure, high-quality sugar and rice
            sourced from trusted farmers and processed with care. With a strong
            focus on hygiene, consistency, and natural goodness.
          </p>
          <img src="{{ asset('images/fssi.png') }}" alt="FSSAI" class="fssai">
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-lg-3">
        <h6 class="footer-title">Quick Links</h6>
        <ul class="footer-links ft_links">
          <div>
            <li><span>›</span><a href="{{ route('home') }}">Home</a></li>
            <li><span>›</span><a href="{{ route('about') }}">About</a></li>
            <li><span>›</span><a href="{{ route('products') }}">Products</a></li>
          </div>
          <ul class="footer-links">
            <div>
              <li><span>›</span><a href="{{ route('home') }}#quality">Quality</a></li>
              <li><span>›</span><a href="{{ route('contact') }}">Contact</a></li>
            </div>
          </ul>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-lg-5">
        <h6 class="footer-title">Contact Us</h6>
        <ul class="footer-contact">
          <li>
            <svg viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2c.3-.3.7-.4 1.1-.3 1.2.4 2.6.6 4 .6.6 0 1 .4 1 1V21c0 .6-.4 1-1 1C10.6 22 2 13.4 2 3c0-.6.4-1 1-1h4.5c.6 0 1 .4 1 1 0 1.4.2 2.8.6 4 .1.4 0 .8-.3 1.1l-2.2 2.2z"/></svg>
            +91 98765 43210
          </li>
          <li>
            <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
            contact@av2agro.com
          </li>
          <li>
            <svg viewBox="0 0 24 24"><path d="M12 2C8.1 2 5 5.1 5 9c0 5.3 7 13 7 13s7-7.7 7-13c0-3.9-3.1-7-7-7zm0 9.5c-1.4 0-2.5-1.1-2.5-2.5S10.6 6.5 12 6.5s2.5 1.1 2.5 2.5S13.4 11.5 12 11.5z"/></svg>
            Av2 agro Foods Pvt. Ltd.<br>
            Near Industrial Estate, Wayanad,<br>
            Kerala – 686001, India
          </li>
        </ul>
        <div class="footer-social">
          <a href="#"><i class="bi bi-facebook"></i></a>
          <a href="#"><i class="bi bi-instagram"></i></a>
          <a href="#"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>

    </div>

    <div class="footer-bottom">
      © {{ date('Y') }} Av2 agro. All Rights Reserved.
    </div>
  </div>
</footer>
