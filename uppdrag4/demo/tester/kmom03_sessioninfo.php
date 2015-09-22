<h1>Visa information om sessionen</h1>
<p>Här följer detaljer om den nuvarande sessionen:</p>
<p><strong>Id:</strong> <?php echo session_id(); ?></p>
<p><strong>Namn:</strong> <?php echo session_name(); ?></p>
<p><strong>Expire</strong> (minuter): <?php echo session_cache_expire(); ?></p>
<p><strong>Limiter:</strong> <?php echo session_cache_limiter(); ?></p>