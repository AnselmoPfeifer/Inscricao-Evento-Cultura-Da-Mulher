
CREATE TABLE IF NOT EXISTS `inscricao` (
  `inscricao_id` int(11) NOT NULL,
  `inscricao_nome` varchar(100) NOT NULL,
  `inscricao_identidade` varchar(20) NOT NULL,
  `inscricao_emissoridt` varchar(20) NOT NULL,
  `inscricao_endereco` varchar(100) NOT NULL,
  `inscricao_numero` int(10) NOT NULL,
  `inscricao_bairro` varchar(10) NOT NULL,
  `inscricao_cep` varchar(9) NOT NULL,
  `inscricao_cidade` varchar(100) NOT NULL,
  `inscricao_estado` char(2) NOT NULL,
  `inscricao_email` varchar(100) NOT NULL,
  `inscricao_telefone` varchar(15) NOT NULL,
  `inscricao_militar` varchar(30) NOT NULL,
  `inscricao_nome_militar` varchar(100) NOT NULL,
  `inscricao_om` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
ALTER TABLE `inscricao`
  ADD PRIMARY KEY (`inscricao_id`);


--
ALTER TABLE `inscricao`
  MODIFY `inscricao_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
