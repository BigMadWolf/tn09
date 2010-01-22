<td class="left" id="ey_referential_<?php echo $subject->getId() ?>">
<?php if ($subject->isEditableBy($sf_user->getRawValue())) : ?>
  <a href="<?php echo url_for($routePrefix.'_edit', $subject) ?>">
    <?php echo $subject->getLabel() ?>
  </a>
<?php else : ?>
  <?php echo $subject->getLabel() ?>
<?php endif ?>
</td>
<td class="left">
  <?php echo $subject->getCreator() ?>
</td>
<td class="left">
  <?php echo $subject->isDefault() ? ey_show_boolean($subject->isDefault()) : link_to(ey_show_boolean($subject->isDefault()), $routePrefix.'_flagDefault', $subject, array('title' => 'D�finir en tant que choix par d�faut')) ?>
</td>
<td class="left">
<?php if ($subject->isEditableBy($sf_user->getRawValue())) : ?>
  <?php echo link_to(image_tag('edit.png', array('alt' => '')), $routePrefix.'_edit', $subject, array('title' => '�diter ce r�f�rentiel')) ?>
<?php endif ?>
  &nbsp;
<?php if ($subject->isDeletableBy($sf_user->getRawValue())) : ?>
  <?php echo link_to(image_tag('ico_supprimer.gif', array('alt' => '')), $routePrefix.'_delete', $subject, array('title' => 'Supprimer', 'method' => 'delete', 'confirm' => '�tes-vous s�r de vouloir supprimer ce r�f�rentiel ?')) ?>
<?php endif ?>
</td>
