<div style="margin-top: 2em;">
  <!-- Attribut action absent => cible par défaut = la même page -->
  <form method="post">
    <input type="text" name="lastName" id="lastName" placeholder="Nom...">
    <input type="text" name="firstName" id="firstName" placeholder="Prénom...">
    <input type="email" name="email" id="email" placeholder="Email...">
    <br>
    <label for="register_newsletter">M'inscrire à la newsletter</label>
    <input type="checkbox" name="register_newsletter" id="register_newsletter">
    <br>
    <input type="text" name="subject" id="subject" placeholder="Objet...">
    <br>
    <select name="reason" id="reason">
      <option value="contact">Demande de contact</option>
      <option value="devis">Demande de devis</option>
    </select>
    <br>
    <textarea name="message" id="message" cols="30" rows="10" placeholder="Message..."></textarea>
    <br>
    <input type="submit" value="Envoyer">
  </form>
</div>