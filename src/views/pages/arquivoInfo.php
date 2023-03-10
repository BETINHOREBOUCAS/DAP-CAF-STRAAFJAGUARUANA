<?php $render('header'); ?>

<div class="container">
    <h2>Anexos para emissão do CAF</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="separador-anexo">
            <div class="reponsavel">
                <h3>Anexos do responsável</h3>
                <div class="anexo">
                    <label for="file_rg_responsavel" class="label-anexo" access="check_rg_responsavel">
                        <div class="anexo-icon" access="check_rg_responsavel">
                            <i class="fa-solid fa-id-card" access="check_rg_responsavel"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_rg_responsavel">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> RG do responsável.*
                    </div>
                    <input type="file" name="file_rg_responsavel" id="file_rg_responsavel" required>

                    <label for="file_cpf_responsavel" class="label-anexo" access="check_cpf_responsavel">
                        <div class="anexo-icon" access="check_cpf_responsavel">
                            <i class="fa-solid fa-id-card" access="check_cpf_responsavel"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_cpf_responsavel">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> CPF do responsável.
                    </div>
                    <input type="file" name="file_cpf_responsavel" id="file_cpf_responsavel">
                </div>

                <div class="anexo">
                    <label for="file_endereco_responsavel" class="label-anexo" access="check_endereco_responsavel">
                        <div class="anexo-icon" access="check_endereco_responsavel">
                            <i class="fa-solid fa-map-location-dot" access="check_endereco_responsavel"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_endereco_responsavel">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> Comprovante de endereço da UFPA.*
                    </div>
                    <input type="file" name="file_endereco_responsavel" id="file_endereco_responsavel" required>

                    <label for="file_outros_responsavel" class="label-anexo" access="check_outros_responsavel">
                        <div class="anexo-icon" access="check_outros_responsavel">
                            <i class="fa-solid fa-file-circle-question" access="check_outros_responsavel"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_outros_responsavel">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> Outros documentos da UFPA.
                    </div>
                    <input type="file" name="file_outros_responsavel[]" id="file_outros_responsavel" multiple>
                </div>

                <div class="anexo">
                    <label for="file_doc_terra" class="label-anexo" access="check_doc_terra">
                        <div class="anexo-icon" access="check_doc_terra">
                            <i class="fa-solid fa-file-signature" access="check_doc_terra"></i>
                        </div>
                    </label>

                    <div class="anexo-title">
                        <div class="check" id="check_doc_terra">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> Contrato de uso da terra. *
                    </div>
                    <input type="file" name="file_doc_terra" id="file_doc_terra" required>

                    <label for="file_terra_responsavel" class="label-anexo" access="check_terra_responsavel">
                        <div class="anexo-icon" access="check_terra_responsavel">
                            <i class="fa-solid fa-tractor" access="check_terra_responsavel"></i>
                        </div>
                    </label>

                    <div class="anexo-title">
                        <div class="check" id="check_terra_responsavel">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> Doc. do proprietário e ITR/INCRA.*
                    </div>
                    <input type="file" name="file_terra_responsavel[]" id="file_terra_responsavel" multiple required>
                </div>

                <div class="anexo">
                    <label for="file_renda_CNIS" class="label-anexo" access="check_renda_CNIS">
                        <div class="anexo-icon" access="check_renda_CNIS">
                            <i class="fa-solid fa-file-lines" access="check_renda_CNIS"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_renda_CNIS">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> CNIS.*
                    </div>
                    <input type="file" name="file_renda_CNIS[]" id="file_renda_CNIS" multiple required>

                    <label for="file_renda_bolsa_familia" class="label-anexo" access="check_renda_bolsa_familia">
                        <div class="anexo-icon" access="check_renda_bolsa_familia">
                            <i class="fa-solid fa-people-roof" access="check_renda_bolsa_familia"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_renda_bolsa_familia">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> Renda bolsa família.
                    </div>
                    <input type="file" name="file_renda_bolsa_familia" id="file_renda_bolsa_familia">
                </div>

                <div class="anexo">
                    <label for="file_declaracao_renda" class="label-anexo" access="check_declaracao_renda">
                        <div class="anexo-icon" access="check_declaracao_renda">
                            <i class="fa-solid fa-dollar-sign" access="check_declaracao_renda"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_declaracao_renda">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> Declaração de renda. *
                    </div>
                    <input type="file" name="file_declaracao_renda" id="file_declaracao_renda" required>

                    <label for="file_outras_rendas" class="label-anexo" access="check_outras_rendas">
                        <div class="anexo-icon" access="check_outras_rendas">
                            <i class="fa-solid fa-dollar-sign" access="check_outras_rendas"></i>
                        </div>
                    </label>
                    <div class="anexo-title">
                        <div class="check" id="check_outras_rendas">
                            <i class="fa-solid fa-circle-check"></i>
                        </div> Outras rendas.
                    </div>
                    <input type="file" name="file_outras_rendas[]" id="file_outras_rendas" multiple>
                </div>
            </div>

            <?php if (!empty($membros) && isset($membros)) : ?>
                <div class="membro">
                    <h3>Anexos dos membros</h3>
                    <?php foreach ($membros as $key => $value) : ?>
                        <div class="anexo">
                            <label for="file_rg_membro_<?= $value['cpf_membro']; ?>" class="label-anexo" access="check_rg_membro_<?= $value['cpf_membro']; ?>">
                                <div class="anexo-icon" access="check_rg_membro_<?= $value['cpf_membro']; ?>">
                                    <i class="fa-solid fa-id-card" access="check_rg_membro_<?= $value['cpf_membro']; ?>"></i>
                                </div>
                            </label>
                            <div class="anexo-title">
                                <div class="check" id="check_rg_membro_<?= $value['cpf_membro']; ?>">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div> RG do <?= $value['parentesco_membro'] . " - " . $value['nome_membro']; ?>.*
                            </div>
                            <input type="file" name="file_rg_membros[]" id="file_rg_membro_<?= $value['cpf_membro']; ?>" required>

                            <label for="file_cpf_membro_<?= $value['cpf_membro']; ?>" class="label-anexo" access="check_cpf_membro_<?= $value['cpf_membro']; ?>">
                                <div class="anexo-icon" access="check_cpf_membro_<?= $value['cpf_membro']; ?>">
                                    <i class="fa-solid fa-id-card" access="check_cpf_membro_<?= $value['cpf_membro']; ?>"></i>
                                </div>
                            </label>
                            <div class="anexo-title">
                                <div class="check" id="check_cpf_membro_<?= $value['cpf_membro']; ?>">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div> CPF do <?= $value['parentesco_membro'] . " - " . $value['nome_membro']; ?>.*
                            </div>
                            <input type="file" name="file_cpf_membros[]" id="file_cpf_membro_<?= $value['cpf_membro']; ?>" required>
                        </div>


                    <?php endforeach ?>
                </div>
            <?php endif ?>

        </div>
        <div class="ajust-button">
            <div class="button-navigation">
                <a href="<?= $base; ?>/arquivo/<?= $doc_socio[0]['id_socio_responsavel']; ?>">
                    <div class="divButton button-red">Voltar</div>
                </a>
            </div>

            <div class="button-navigation button-center button-green" style="border-radius: 5px">
                <button>Confirmar</button>
            </div>
        </div>
    </form>
</div>

<script src="<?= $base; ?>/assets/js/control-anexos.js"></script>
</body>

</html>