<?php if($this->isEditable() || $entity->bib_acessibilidade_material): ?>
    <p>
        <span class="label">Acessibilidade material: </span>
        <editable-multiselect entity-property="bib_acessibilidade_material" empty-label="Selecione" allow-other="true" box-title="Acessibilidade material:"></editable-multiselect>
    </p>
<?php endif; ?>
<?php if($this->isEditable() || $entity->bib_acessibilidade_servico): ?>
    <p>
        <span class="label">Serviço a pessoas com deficiência?:</span>
        <span class="js-editable" data-edit="bib_acessibilidade_servico" data-original-title="Serviço a pessoas com deficiência?" data-emptytext="Selecione">
            <?php echo $entity->bib_acessibilidade_servico; ?>
        </span>
    </p>
<?php endif; ?>