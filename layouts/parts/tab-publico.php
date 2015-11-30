<div id="tab-publico" class="aba-content">
    <div class="servico">
        <p>
            <span class="label">Faixa etária predominante dos usuários da biblioteca:</span> 
            <span class="js-editable" data-edit="bib_faixaEtariaPredominante" data-original-title="Faixa etária predominante" data-emptytext="Selecione">
                <?php echo $entity->genero; ?>
            </span>
        </p>
        
        <p>
            <span class="label">A biblioteca trabalha com comunidades ou grupos específicos?:</span> 
            <editable-multiselect entity-property="bib_comunidades" empty-label="Selecione" allow-other="true"></editable-multiselect>
        </p>
        
    </div>
</div>