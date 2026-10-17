 <footer class="login-footer">
     <span>
         © {{ date('Y') == '2019' ? '2019' : '2019 – ' . date('Y') }}
         {{ basicSystemInfo()->association_acronym }}. All rights reserved.
     </span>
     <span class="footer-note">
         <svg class="icon" aria-hidden="true">
             <use href="#shield"></use>
         </svg>

         Member access
     </span>
 </footer>
