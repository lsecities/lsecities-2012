<div class="publication-credits">
<?php if(!$obj['extra_publication_metadata']): // switching to only display $obj['extra_publication_metadata'] if available, until Pods can sort pick items ?>
  <?php if($obj['publication_authors']['string']): ?>
    <section>
    <h3>Authors</h3>
    <div><?php echo $obj['publication_authors']['string']; ?></div>
    </section>
  <?php endif; ?>
  <?php if($obj['publication_editors']['string']): ?>
    <section>
    <h3>Editors</h3>
    <div><?php echo $obj['publication_editors']['string']; ?></div>
    </section>
  <?php endif; ?>
  <?php if($obj['publication_editors']['string']): ?>
    <section>
    <h3>Contributors</h3>
    <div><?php echo $obj['publication_editors']['string']; ?></div>
    </section>
  <?php endif; ?>
  <?php if($obj['publication_partners']['string']): ?>
    <section>
    <h3>Partners</h3>
    <div><?php echo $obj['publication_partners']['string']; ?></div>
    </section>
  <?php endif; ?>
<?php else: // (!$obj['extra_publication_metadata']) ?>
  <?php echo $obj['extra_publication_metadata']; ?>
<?php endif; // (!$obj['extra_publication_metadata']) ?>
</div>
