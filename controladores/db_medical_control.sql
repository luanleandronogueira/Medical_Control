-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2024 às 13:14
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_medical_control`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estoques`
--

CREATE TABLE `tb_estoques` (
  `id_estoque` int(11) NOT NULL,
  `nome_estoque` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_estoques`
--

INSERT INTO `tb_estoques` (`id_estoque`, `nome_estoque`) VALUES
(1, 'PSF CENTRO'),
(4, 'PSF DA BANANEIRA'),
(5, 'PSF BAIRRO NOVO'),
(6, 'FARMáCIA CENTRAL'),
(7, 'PSF MANDACARU'),
(8, 'HOSPITAL MUNICIPAL'),
(9, 'GERAL'),
(10, 'ODONTOLóGICOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_historico`
--

CREATE TABLE `tb_historico` (
  `id_historico` int(11) NOT NULL,
  `historico_historico` text NOT NULL,
  `data_historico` datetime NOT NULL,
  `sessao_historico` varchar(220) NOT NULL,
  `item_tras_historico` varchar(220) NOT NULL,
  `quantidade_historico` bigint(20) NOT NULL,
  `id_estoque_enviado_historico` int(11) NOT NULL,
  `id_estoque_recebido_historico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_historico`
--

INSERT INTO `tb_historico` (`id_historico`, `historico_historico`, `data_historico`, `sessao_historico`, `item_tras_historico`, `quantidade_historico`, `id_estoque_enviado_historico`, `id_estoque_recebido_historico`) VALUES
(1, 'Testando transferência de estoque para outro estoque dentro da mesma informação com os lotes cadastrados.', '2023-12-27 00:00:00', 'Luan Leandro Nogueira', 'AAS 50MG', 10, 9, 1),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere ', '2023-12-27 00:00:00', 'Luan Leandro Nogueira', 'AAS 50MG', 10, 9, 5),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere ', '2023-12-27 00:00:00', 'Luan Leandro Nogueira', 'AAS 50MG', 10, 9, 5),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere ', '2023-12-27 00:00:00', 'Luan Leandro Nogueira', 'AAS 50MG', 10, 9, 5),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere ', '2023-12-27 16:30:36', 'Luan Leandro Nogueira', 'DIPIRONA DE 20MG', 100, 9, 6),
(6, 'Para uso de Emergência na transferência do paciente FULANO DE TAL', '2023-12-29 09:50:37', 'Luan Leandro Nogueira', 'DIPIRONA DE 20MG', 14, 9, 8),
(7, 'Devolução por estarem vencidos', '2023-12-29 09:52:51', 'Luan Leandro Nogueira', 'MORFINA 10ML', 10, 8, 9),
(8, 'Estoque vazio', '2023-12-29 16:09:36', 'Luan Leandro Nogueira', 'DIPIRONA DE 20MG', 200, 9, 5),
(9, 'Transferência de emergência do paciente que precisava', '2023-12-30 11:44:54', 'Luan Leandro Nogueira', 'AAS 50MG', 10, 9, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nomeclatura`
--

CREATE TABLE `tb_nomeclatura` (
  `id_nomeclatura` int(11) NOT NULL,
  `nome_nomeclatura` varchar(220) NOT NULL,
  `uni_medida_nomeclatura` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_nomeclatura`
--

INSERT INTO `tb_nomeclatura` (`id_nomeclatura`, `nome_nomeclatura`, `uni_medida_nomeclatura`) VALUES
(1, 'DIPIRONA DE 20MG', 'CARTELA'),
(2, 'AMOXILINA 50ML', 'FRASCO'),
(24, 'LOSARTANA 50MG', 'CARTELA'),
(25, 'CORUS 50 MG', 'CARTELA'),
(26, 'AAS 50MG', 'CARTELA'),
(29, 'MORFINA 10ML', 'AMPOLA'),
(30, 'GASES ', 'PACOTE'),
(31, 'TRAMADOL 50MG/2ML', 'FRASCO'),
(32, 'TILENOL 50MG', 'CARTELA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `id_pedido` int(11) NOT NULL,
  `n_nota_fiscal_pedido` varchar(220) NOT NULL,
  `chave_nota_pedido` varchar(220) NOT NULL,
  `data_entrada_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`id_pedido`, `n_nota_fiscal_pedido`, `chave_nota_pedido`, `data_entrada_pedido`) VALUES
(1, '1234', '4321', '2024-01-04'),
(2, '2222222222', '12342222222222231241241231231231', '2024-01-04'),
(3, '142342', '12342222222222231241241231231231', '2024-01-04'),
(4, '1414', '12342222222222231241241231231231', '2024-01-03'),
(5, '142201', '123456789987654321123455678888989776', '2024-01-04'),
(6, '1', '11', '2024-01-05'),
(7, '13.12.3', '12342222222222231241241231231231', '2023-07-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_p_emitido`
--

CREATE TABLE `tb_p_emitido` (
  `id_p_emitido` int(11) NOT NULL,
  `n_p_emitido` int(11) NOT NULL,
  `nomeclatura_p_emitido` varchar(220) NOT NULL,
  `quantidade_p_emitido` bigint(20) NOT NULL,
  `data_val_p_emitido` date NOT NULL,
  `lote_p_emitido` varchar(220) NOT NULL,
  `fabricante_p_emitido` varchar(220) NOT NULL,
  `estoque_p_emitido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_p_emitido`
--

INSERT INTO `tb_p_emitido` (`id_p_emitido`, `n_p_emitido`, `nomeclatura_p_emitido`, `quantidade_p_emitido`, `data_val_p_emitido`, `lote_p_emitido`, `fabricante_p_emitido`, `estoque_p_emitido`) VALUES
(1, 3, 'AMOXILINA 50ML', 123, '2024-01-10', '13121', 'AZIPHARMA', 9),
(2, 3, 'AMOXILINA 50ML', 123, '2024-01-10', '13121', 'AZIPHARMA', 9),
(3, 5, 'TILENOL 50MG', 100, '2025-10-22', '142314', 'CIMED', 9),
(4, 5, 'TILENOL 50MG', 99, '2025-12-12', '12321', 'NEOQUIMICA', 9),
(5, 6, 'LOSARTANA 50MG', 100, '2025-01-05', '1', 'AZIPHARMA', 9),
(6, 7, 'DIPIRONA DE 20MG', 100, '2024-01-05', 'LZ453', 'CIMED', 9),
(7, 7, 'AMOXILINA 50ML', 100, '2024-01-05', 'LZ453', 'AZIPHARMA', 9),
(8, 7, 'LOSARTANA 50MG', 100, '2024-01-05', 'LZ453', 'NEOQUIMICA', 9),
(9, 7, 'CORUS 50 MG', 100, '2024-01-31', 'LZ453', 'NEOQUIMICA', 9),
(10, 7, 'AAS 50MG', 1000, '2024-01-05', 'LZ453', 'NEOQUIMICA', 9),
(11, 7, 'MORFINA 10ML', 10, '2024-01-05', 'LZ453', 'NEOQUIMICA', 9),
(12, 7, 'GASES ', 100, '2024-01-05', 'LZ453', 'AZIPHARMA', 9),
(13, 7, 'TRAMADOL 50MG/2ML', 200, '2024-01-05', 'LZ453', 'NEOQUIMICA', 9),
(14, 7, 'TILENOL 50MG', 100, '2024-01-05', 'LZ453', 'AZIPHARMA', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_remedio`
--

CREATE TABLE `tb_remedio` (
  `id_remedio` int(11) NOT NULL,
  `nome_remedio` varchar(220) NOT NULL,
  `uni_medida_remedio` varchar(100) NOT NULL,
  `quantidade_remedio` bigint(20) NOT NULL,
  `vencimento_remedio` date NOT NULL,
  `estoque_remedio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_remedio`
--

INSERT INTO `tb_remedio` (`id_remedio`, `nome_remedio`, `uni_medida_remedio`, `quantidade_remedio`, `vencimento_remedio`, `estoque_remedio`) VALUES
(23, 'AAS 50MG', 'CARTELA', 1350, '2024-12-12', 9),
(24, 'AAS 50MG', 'CARTELA', 185, '2024-12-12', 1),
(25, 'AAS 50MG', 'CARTELA', 310, '2024-12-12', 4),
(26, 'AAS 50MG', 'CARTELA', 27, '2024-12-12', 5),
(27, 'DIPIRONA DE 20MG', 'CARTELA', 786, '2024-12-12', 9),
(28, 'DIPIRONA DE 20MG', 'CARTELA', 100, '2024-12-12', 6),
(29, 'DIPIRONA DE 20MG', 'CARTELA', 114, '2025-01-01', 8),
(30, 'AMOXILINA 50ML', 'FRASCO', 80, '2025-01-01', 8),
(31, 'LOSARTANA 50MG', 'CARTELA', 0, '2025-01-01', 8),
(32, 'CORUS 50 MG', 'CAIXA', 100, '2025-01-01', 8),
(33, 'AAS 50MG', 'CARTELA', 20, '2025-01-01', 8),
(34, 'MORFINA 10ML', 'AMPOLA', 0, '2025-01-01', 8),
(35, 'GASES ', 'PACOTE', 200, '2025-01-01', 8),
(36, 'MORFINA 10ML', 'AMPOLA', 20, '2025-01-01', 9),
(37, 'DIPIRONA DE 20MG', 'CARTELA', 196, '2024-12-12', 5),
(38, 'TRAMADOL 50MG/2ML', 'COMPRIMIDO', 600, '2024-12-01', 9),
(39, 'MORFINA 10ML', 'FRASCO', 10, '2024-01-03', 1),
(40, 'TILENOL 50MG', 'CARTELA', 299, '2025-10-22', 9),
(41, 'LOSARTANA 50MG', 'CARTELA', 200, '2025-01-05', 9),
(42, 'AMOXILINA 50ML', 'CARTELA', 100, '2024-01-05', 9),
(43, 'CORUS 50 MG', 'CARTELA', 100, '2024-01-31', 9),
(44, 'GASES ', 'CARTELA', 100, '2024-01-05', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_saida`
--

CREATE TABLE `tb_saida` (
  `id_saida` int(11) NOT NULL,
  `status_receita_saida` varchar(20) NOT NULL,
  `id_remedio_saida` int(11) NOT NULL,
  `remedio_saida` varchar(220) NOT NULL,
  `quantidade_saida` int(11) NOT NULL,
  `sus_saida` varchar(220) NOT NULL,
  `nome_paciente_saida` varchar(220) NOT NULL,
  `n_receita_saida` varchar(100) NOT NULL,
  `observacao_saida` text NOT NULL,
  `sessao_saida` varchar(100) NOT NULL,
  `data_saida` datetime NOT NULL,
  `estoque_saida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_saida`
--

INSERT INTO `tb_saida` (`id_saida`, `status_receita_saida`, `id_remedio_saida`, `remedio_saida`, `quantidade_saida`, `sus_saida`, `nome_paciente_saida`, `n_receita_saida`, `observacao_saida`, `sessao_saida`, `data_saida`, `estoque_saida`) VALUES
(3, 'Com Receita', 33, 'AAS 50MG', 10, '123556433', 'Luan Leandro Nogueira', '61', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique', 'Aylla De Kássia Alves Ferreira Nogueira', '2023-12-29 15:53:45', 8),
(4, 'Sem Receita', 24, 'AAS 50MG', 3, '12345', 'Maria Benedita de Carvalho', '51232', 'A receita foi passada pelo médico do Dom Moura em Garanhuns', 'Jucelino Ferreira Leite Junior', '2023-12-29 16:00:47', 1),
(5, 'Sem Receita', 24, 'AAS 50MG', 4, '1234', 'Rosa Maria da Silva', '443222', 'Feito com Sucesso!', 'Jucelino Ferreira Leite Junior', '2023-12-29 16:04:16', 1),
(6, 'Com Receita', 37, 'DIPIRONA DE 20MG', 2, '89293729', 'joselma maria da silva', '2311', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique', 'Luciana Leandro De Moraes', '2023-12-29 16:10:20', 5),
(7, 'Com Receita', 26, 'AAS 50MG', 3, '3523131', '', '8763', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique', 'Luciana Leandro De Moraes', '2023-12-29 16:12:59', 5),
(8, 'Com Receita', 37, 'DIPIRONA DE 20MG', 2, '4321', 'Roseli Duarte Huerta Da Silva', '4532', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique', 'Luciana Leandro De Moraes', '2023-12-29 16:14:16', 5),
(9, 'Com Receita', 24, 'AAS 50MG', 10, '123234345345', 'Luan Leandro Nogueira', '09', 'Distribuição de acordo com a receita dada dia 21/09/2023', 'Jucelino Ferreira Leite Junior', '2023-12-30 11:56:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `nome_usuario` varchar(220) NOT NULL,
  `cpf_usuario` varchar(11) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL,
  `tipo_usuario` varchar(1) NOT NULL,
  `setor_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `nome_usuario`, `cpf_usuario`, `senha_usuario`, `tipo_usuario`, `setor_usuario`) VALUES
(1, 'Luan Leandro Nogueira', '11769868488', '$2y$10$f.4xUcUpJHDFOX/0YsCENeJHYvaL6ccc2grcbFWD0YOhKSR5/FAKa', 'a', 7),
(6, 'Juan S. Verón', '99582415010', '$2y$10$HjZelfK/JjT4JN5XfhzdGe4IoD0sxsILio4BLaOnyP2MILkYx0EvW', 'u', 1),
(7, 'Aylla De Kássia Alves Ferreira Nogueira', '08635248422', '$2y$10$2bWzhcBitaXqx9zeTKNSg.dO683Ih2eq52tfPiu7.3wXq3tAVZgFW', 'u', 8),
(8, 'Jucelino Ferreira Leite Junior', '99999999999', '$2y$10$D7eQuuCXuLbsV0e.CjzC3eqn8E5eK8ga8jdsSeScsOpOPCwqldUGO', 'u', 1),
(9, 'Luciana Leandro De Moraes', '88888888888', '$2y$10$hYHohxsv1GIjgsnw7ufs5.xc3xMpcnmGMDBrSCAJVuNyjxhK7qP.a', 'u', 5),
(10, 'Vagna F. Leite', '22222222222', '$2y$10$01sTta0Tyl1hONykjj/o6ePymiGziDFx34y0nnh9Spxye2QhCYueO', 'u', 7);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_estoques`
--
ALTER TABLE `tb_estoques`
  ADD PRIMARY KEY (`id_estoque`);

--
-- Índices para tabela `tb_historico`
--
ALTER TABLE `tb_historico`
  ADD PRIMARY KEY (`id_historico`),
  ADD KEY `fk_enviado_historico` (`id_estoque_enviado_historico`),
  ADD KEY `fk_recebido_historico` (`id_estoque_recebido_historico`);

--
-- Índices para tabela `tb_nomeclatura`
--
ALTER TABLE `tb_nomeclatura`
  ADD PRIMARY KEY (`id_nomeclatura`);

--
-- Índices para tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Índices para tabela `tb_p_emitido`
--
ALTER TABLE `tb_p_emitido`
  ADD PRIMARY KEY (`id_p_emitido`),
  ADD KEY `fk_estoque_p_emitido` (`estoque_p_emitido`),
  ADD KEY `fk_n_p_emitido` (`n_p_emitido`);

--
-- Índices para tabela `tb_remedio`
--
ALTER TABLE `tb_remedio`
  ADD PRIMARY KEY (`id_remedio`),
  ADD KEY `fk_estoque_remedio` (`estoque_remedio`);

--
-- Índices para tabela `tb_saida`
--
ALTER TABLE `tb_saida`
  ADD PRIMARY KEY (`id_saida`),
  ADD KEY `fk_estoque_saida` (`estoque_saida`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_setor_usuario` (`setor_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_estoques`
--
ALTER TABLE `tb_estoques`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_historico`
--
ALTER TABLE `tb_historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_nomeclatura`
--
ALTER TABLE `tb_nomeclatura`
  MODIFY `id_nomeclatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_p_emitido`
--
ALTER TABLE `tb_p_emitido`
  MODIFY `id_p_emitido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_remedio`
--
ALTER TABLE `tb_remedio`
  MODIFY `id_remedio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `tb_saida`
--
ALTER TABLE `tb_saida`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_historico`
--
ALTER TABLE `tb_historico`
  ADD CONSTRAINT `fk_enviado_historico` FOREIGN KEY (`id_estoque_enviado_historico`) REFERENCES `tb_estoques` (`id_estoque`),
  ADD CONSTRAINT `fk_recebido_historico` FOREIGN KEY (`id_estoque_recebido_historico`) REFERENCES `tb_estoques` (`id_estoque`);

--
-- Limitadores para a tabela `tb_p_emitido`
--
ALTER TABLE `tb_p_emitido`
  ADD CONSTRAINT `fk_estoque_p_emitido` FOREIGN KEY (`estoque_p_emitido`) REFERENCES `tb_estoques` (`id_estoque`),
  ADD CONSTRAINT `fk_n_p_emitido` FOREIGN KEY (`n_p_emitido`) REFERENCES `tb_pedido` (`id_pedido`);

--
-- Limitadores para a tabela `tb_remedio`
--
ALTER TABLE `tb_remedio`
  ADD CONSTRAINT `fk_estoque_remedio` FOREIGN KEY (`estoque_remedio`) REFERENCES `tb_estoques` (`id_estoque`);

--
-- Limitadores para a tabela `tb_saida`
--
ALTER TABLE `tb_saida`
  ADD CONSTRAINT `fk_estoque_saida` FOREIGN KEY (`estoque_saida`) REFERENCES `tb_estoques` (`id_estoque`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_setor_usuario` FOREIGN KEY (`setor_usuario`) REFERENCES `tb_estoques` (`id_estoque`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
