<div id="tab-publico" class="aba-content">
    <div class="servico">

        <?php if($this->isEditable() || $entity->bib_faixaEtariaPredominantes): ?>
        <p>
            <span class="label">Faixa etária predominante dos usuários da biblioteca:</span>
            <span class="js-editable" data-edit="bib_faixaEtariaPredominante" data-original-title="Faixa etária predominante" data-emptytext="Selecione">
                <?php echo $entity->bib_faixaEtariaPredominante; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_comunidades): ?>
        <p>
            <span class="label">A biblioteca trabalha com comunidades ou grupos específicos?</span> 
            <editable-multiselect entity-property="bib_comunidades" empty-label="Selecione" allow-other="true" box-title="A biblioteca trabalha com comunidades ou grupos específicos?:"></editable-multiselect>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || $entity->bib_publico_frequenciaMedia): ?>
        <p>
            <span class="label">Freqüência média mensal dos usuários na biblioteca:</span>
            <span class="js-editable" data-edit="bib_publico_frequenciaMedia" data-original-title="Freqüência média mensal dos usuários na biblioteca" data-emptytext="Selecione">
                <?php echo $entity->bib_publico_frequenciaMedia; ?>
            </span>
        </p>
        <?php endif; ?>


        <br>
        <strong>Horários de Funcionamento</strong>

        <script>
        $(function(){
            // Fixes editable input size based on placeholder length
            // Fixes padding right hardcoded on 24px, now 0;
            $('.js-editable').on('shown', function(e, editable) {
                var placeholder = editable.input.$input.attr('placeholder');
                if (placeholder) {
                    editable.input.$input.attr('size', placeholder.length);
                }
                editable.input.$input.css('padding-right', 0);

                if ($(this).hasClass('js-mask-time')) {
                    //Mask
                    var masks = ['00:00'];
                    editable.input.$input.mask(masks[0], {onKeyPress:
                       function(val, e, field, options) {
                           field.mask(masks[0], options) ;
                       }
                    });
                }
            });
        });
        </script>
        <style>
            .bib-horario-dia {
                width: 90px;
                display: inline-block;
            }
        </style>

        <?php if($this->isEditable() || ($entity->bib_horario_segunda_das && $entity->bib_horario_segunda_ate)): ?>
        <p>
            <span class="bib-horario-dia">Segundas-feiras</span> <?php if(!$this->isEditable()) echo 'das'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_segunda_das" data-original-title="Horário de abertura segundas-feiras" data-emptytext="das">
                <?php echo $entity->bib_horario_segunda_das; ?>
            </span>
            <?php if(!$this->isEditable()) echo 'até as'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_segunda_ate" data-original-title="Horário de fechamento segundas-feiras" data-emptytext="até as">
                <?php echo $entity->bib_horario_segunda_ate; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || ($entity->bib_horario_terca_das && $entity->bib_horario_terca_ate)): ?>
        <p>
            <span class="bib-horario-dia">Terças-feiras</span> <?php if(!$this->isEditable()) echo 'das'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_terca_das" data-original-title="Horário de abertura terças-feiras" data-emptytext="das">
                <?php echo $entity->bib_horario_terca_das; ?>
            </span>
            <?php if(!$this->isEditable()) echo 'até as'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_terca_ate" data-original-title="Horário de fechamento terças-feiras" data-emptytext="até as">
                <?php echo $entity->bib_horario_terca_ate; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || ($entity->bib_horario_quarta_das && $entity->bib_horario_quarta_ate)): ?>
        <p>
            <span class="bib-horario-dia">Quartas-feiras</span> <?php if(!$this->isEditable()) echo 'das'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_quarta_das" data-original-title="Horário de abertura quartas-feiras" data-emptytext="das">
                <?php echo $entity->bib_horario_quarta_das; ?>
            </span>
            <?php if(!$this->isEditable()) echo 'até as'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_quarta_ate" data-original-title="Horário de fechamento quartas-feiras" data-emptytext="até as">
                <?php echo $entity->bib_horario_quarta_ate; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || ($entity->bib_horario_quinta_das && $entity->bib_horario_quinta_ate)): ?>
        <p>
            <span class="bib-horario-dia">Quintas-feiras</span> <?php if(!$this->isEditable()) echo 'das'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_quinta_das" data-original-title="Horário de abertura quintas-feiras" data-emptytext="das">
                <?php echo $entity->bib_horario_quinta_das; ?>
            </span>
            <?php if(!$this->isEditable()) echo 'até as'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_quinta_ate" data-original-title="Horário de fechamento quintas-feiras" data-emptytext="até as">
                <?php echo $entity->bib_horario_quinta_ate; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || ($entity->bib_horario_sexta_das && $entity->bib_horario_sexta_ate)): ?>
        <p>
            <span class="bib-horario-dia">Sextas-feiras</span> <?php if(!$this->isEditable()) echo 'das'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_sexta_das" data-original-title="Horário de abertura sextas-feiras" data-emptytext="das">
                <?php echo $entity->bib_horario_sexta_das; ?>
            </span>
            <?php if(!$this->isEditable()) echo 'até as'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_sexta_ate" data-original-title="Horário de fechamento sextas-feiras" data-emptytext="até as">
                <?php echo $entity->bib_horario_sexta_ate; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || ($entity->bib_horario_sabado_das && $entity->bib_horario_sabado_ate)): ?>
        <p>
            <span class="bib-horario-dia">Sábados</span> <?php if(!$this->isEditable()) echo 'das'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_sabado_das" data-original-title="Horário de abertura sábados" data-emptytext="das">
                <?php echo $entity->bib_horario_sabado_das; ?>
            </span>
            <?php if(!$this->isEditable()) echo 'até as'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_sabado_ate" data-original-title="Horário de fechamento sábados" data-emptytext="até as">
                <?php echo $entity->bib_horario_sabado_ate; ?>
            </span>
        </p>
        <?php endif; ?>

        <?php if($this->isEditable() || ($entity->bib_horario_domingo_das && $entity->bib_horario_domingo_ate)): ?>
        <p>
            <span class="bib-horario-dia">Domingos</span> <?php if(!$this->isEditable()) echo 'das'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_domingo_das" data-original-title="Horário de abertura domingos" data-emptytext="das">
                <?php echo $entity->bib_horario_domingo_das; ?>
            </span>
            <?php if(!$this->isEditable()) echo 'até as'; ?>
            <span class="js-editable js-mask-time" data-edit="bib_horario_domingo_ate" data-original-title="Horário de fechamento domingos" data-emptytext="até as">
                <?php echo $entity->bib_horario_domingo_ate; ?>
            </span>
        </p>
        <?php endif; ?>
    </div>
</div>