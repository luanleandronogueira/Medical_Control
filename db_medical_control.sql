-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Dez-2024 às 13:50
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

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
-- Estrutura da tabela `tb_carrinho_transferencia`
--

CREATE TABLE `tb_carrinho_transferencia` (
  `id_carrinho_transferencia` int(11) NOT NULL,
  `id_remedio_carrinho_transferencia` int(11) NOT NULL,
  `nome_carrinho_transferencia` varchar(220) NOT NULL,
  `quantidade_carrinho_transferencia` bigint(20) NOT NULL,
  `estoque_enviado_carrinho_transferencia` int(11) NOT NULL,
  `estoque_destino_carrinho_transferencia` int(11) NOT NULL,
  `data_carrinho_transferencia` date NOT NULL,
  `lote_carrinho_transferencia` varchar(20) NOT NULL,
  `status_carrinho_transferencia` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_data_retirada`
--

CREATE TABLE `tb_data_retirada` (
  `id_data_retirada` int(11) NOT NULL,
  `id_remedio_data_retirada` int(11) NOT NULL,
  `data_data_retirada` date NOT NULL,
  `prox_retirada_data_retirada` date NOT NULL,
  `cpf_paciente_data_retirada` varchar(15) NOT NULL,
  `nome_data_retirada` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_data_retirada`
--

INSERT INTO `tb_data_retirada` (`id_data_retirada`, `id_remedio_data_retirada`, `data_data_retirada`, `prox_retirada_data_retirada`, `cpf_paciente_data_retirada`, `nome_data_retirada`) VALUES
(9, 50, '2024-07-17', '2024-07-17', '11769868488', '43311'),
(10, 58, '2024-07-17', '2024-07-01', '11769868488', 'Luan Nogueira'),
(11, 58, '2024-07-17', '2024-08-01', '11769868488', 'Luan NN'),
(12, 50, '2024-07-17', '2024-08-01', '11769868488', 'Luan Nogueira'),
(13, 59, '2024-07-17', '2024-08-01', '11769868488', 'Luan Nogueira');

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
(7, 'PSF MANDACARU'),
(8, 'HOSPITAL MUNICIPAL'),
(9, 'GERAL');

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
(46, 'G para MA 001', '2024-12-05 00:00:00', 'Luan Leandro Nogueira', 'TRAMADOL 50MG/2ML', 1, 9, 7),
(47, 'G para MA 001', '2024-12-05 00:00:00', 'Luan Leandro Nogueira', 'TRAMADOL 50MG/2ML', 1, 9, 7),
(48, 'G para MAND 002', '2024-12-05 00:00:00', 'Luan Leandro Nogueira', 'TRAMADOL 50MG/2ML', 1, 9, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lote`
--

CREATE TABLE `tb_lote` (
  `id_lote` int(11) NOT NULL,
  `numero_lote` varchar(20) NOT NULL,
  `status_lote` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_lote`
--

INSERT INTO `tb_lote` (`id_lote`, `numero_lote`, `status_lote`) VALUES
(62, '081202', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nomeclatura`
--

CREATE TABLE `tb_nomeclatura` (
  `id_nomeclatura` int(11) NOT NULL,
  `nome_nomeclatura` varchar(220) NOT NULL,
  `uni_medida_nomeclatura` varchar(220) NOT NULL,
  `quant_minima_nomeclatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_nomeclatura`
--

INSERT INTO `tb_nomeclatura` (`id_nomeclatura`, `nome_nomeclatura`, `uni_medida_nomeclatura`, `quant_minima_nomeclatura`) VALUES
(1, 'DIPIRONA DE 20MG', 'CARTELA', 100),
(2, 'AMOXILINA 50ML', 'FRASCO', 60),
(24, 'LOSARTANA 50MG', 'CARTELA', 300),
(25, 'CORUS 50 MG', 'CARTELA', 200),
(26, 'AAS 50MG', 'CARTELA', 0),
(29, 'MORFINA 10ML', 'AMPOLA', 0),
(30, 'GASES', 'PACOTE', 200),
(31, 'TRAMADOL 50MG/2ML', 'FRASCO', 0),
(32, 'TILENOL 50MG', 'CARTELA', 0),
(33, 'CORUS 100 MG', 'CARTELA', 100);

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
(9, '001', 'Sem chave fiscal', '2024-07-15');

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
(18, 9, 'CORUS 50 MG - 200', 1000, '2025-07-15', 'LZ453', 'NEOQUIMICA', 9),
(19, 9, 'CORUS 100 MG - 100', 200, '2026-07-15', '1', 'AZIPHARMA', 9),
(20, 9, 'DIPIRONA DE 20MG - 100', 200, '2024-12-31', 'AZ165GEE', 'MEDIAL ', 9),
(21, 9, 'DIPIRONA DE 20MG', 100, '2026-08-01', 'AZ165GEE', 'MEDIAL ', 9),
(22, 9, 'LOSARTANA 50MG', 1000, '2026-07-16', 'AZ165GEE', 'MEDIAL ', 9),
(23, 9, 'LOSARTANA 50MG', 1111, '2027-07-17', 'AZ165GEE', 'MEDIAL ', 9),
(24, 9, 'AAS 50MG', 2000, '2027-07-16', 'QWE1121', 'EUROPHARMA', 9),
(25, 9, 'AAS 50MG', 10, '2024-07-17', 'QWE1121', 'EUROPHARMA', 9),
(26, 9, 'AAS 50MG', 1, '2024-07-17', 'AZ165GEE', 'EUROPHARMA', 9),
(27, 9, 'AAS 50MG', 10, '2024-07-16', 'AZ165GEE', 'EUROPHARMA', 9),
(28, 9, 'TILENOL 50MG', 20, '2034-07-25', '12321', 'AZIPHARMA', 9),
(29, 9, 'LOSARTANA 50MG', 1000, '2025-07-31', 'LZ453', 'NEOQUIMICA', 9),
(30, 9, 'AAS 50MG', 999, '2026-07-31', 'LZ453', 'CIMED', 9),
(31, 9, 'TRAMADOL 50MG/2ML', 10, '2026-12-05', 'LZ453', 'NEOQUIMICA', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_remedio`
--

CREATE TABLE `tb_remedio` (
  `id_remedio` int(11) NOT NULL,
  `nome_remedio` varchar(220) NOT NULL,
  `uni_medida_remedio` varchar(100) NOT NULL,
  `quantidade_remedio` bigint(20) NOT NULL,
  `quant_min_estoque_remedio` bigint(20) NOT NULL,
  `vencimento_remedio` date NOT NULL,
  `estoque_remedio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_remedio`
--

INSERT INTO `tb_remedio` (`id_remedio`, `nome_remedio`, `uni_medida_remedio`, `quantidade_remedio`, `quant_min_estoque_remedio`, `vencimento_remedio`, `estoque_remedio`) VALUES
(77, 'TRAMADOL 50MG/2ML', 'CARTELA', 7, 0, '2026-12-05', 9),
(78, 'TRAMADOL 50MG/2ML', 'CARTELA', 3, 0, '2026-12-05', 7);

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
(10, 'Com Receita', 50, 'CORUS 50 MG', 1, '11769868488', 'Luan Leandro Nogueira', '1230', 'id_remedio_data_retirada', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(11, 'Com Receita', 50, 'CORUS 50 MG', 1, '12313', 'Luan Leandro Nogueira', '42313', '2024-07-17', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(12, 'Com Receita', 50, 'CORUS 50 MG', 0, '11769868488', 'Luan Leandro Nogueira', '1234', 'cpf_paciente_data_retirada', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(13, 'Com Receita', 50, 'CORUS 50 MG', 23, '11769868488', 'Luan Nogueira', '232', 'id_remedio', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(14, 'Com Receita', 50, 'CORUS 50 MG', 0, '11769868488', 'Luan NN', '31', 'id_remedio', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(15, 'Com Receita', 50, 'CORUS 50 MG', 1, '11769868488', 'Luan N1', '20', 'id_remedio', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(16, 'Com Receita', 50, 'CORUS 50 MG', 1, '11769868488', 'Luan Nogueira 1', '12', 'id_remedio', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(17, 'Com Receita', 50, 'CORUS 50 MG', 1, '11769868488', 'Luan Nogueira 1', '11', '2147483647', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(18, 'Com Receita', 50, 'CORUS 50 MG', 1, '11769868488', '43311', '12', '12', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(19, 'Com Receita', 58, 'AAS 50MG', 1, '11769868488', 'Luan Nogueira', '21211', '', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(20, 'Com Receita', 58, 'AAS 50MG', 0, '11769868488', 'Luan NN', '1233', 'zdfdf', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(21, 'Com Receita', 50, 'CORUS 50 MG', 2, '11769868488', 'Luan Nogueira', '123', '', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8),
(22, 'Com Receita', 59, 'LOSARTANA 50MG', 1, '11769868488', 'Luan Nogueira', '12', '', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-07-17 00:00:00', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_subsetor_interno`
--

CREATE TABLE `tb_subsetor_interno` (
  `id_subsetor` int(11) NOT NULL,
  `nome_subsetor` varchar(100) NOT NULL,
  `estoque_subsetor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_subsetor_interno`
--

INSERT INTO `tb_subsetor_interno` (`id_subsetor`, `nome_subsetor`, `estoque_subsetor`) VALUES
(1, 'ENFERMARIA', 7),
(3, 'SALA DO DENTISTA', 7),
(4, 'SALA DE ATENDIMENTO', 7),
(5, 'ENFERMARIA DO HOSPITAL', 8);

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
(7, 'Aylla De Kássia Alves Ferreira Nogueira', '08635248422', '$2y$10$2bWzhcBitaXqx9zeTKNSg.dO683Ih2eq52tfPiu7.3wXq3tAVZgFW', 'u', 8);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_carrinho_transferencia`
--
ALTER TABLE `tb_carrinho_transferencia`
  ADD PRIMARY KEY (`id_carrinho_transferencia`);

--
-- Índices para tabela `tb_data_retirada`
--
ALTER TABLE `tb_data_retirada`
  ADD PRIMARY KEY (`id_data_retirada`);

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
-- Índices para tabela `tb_lote`
--
ALTER TABLE `tb_lote`
  ADD PRIMARY KEY (`id_lote`);

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
-- Índices para tabela `tb_subsetor_interno`
--
ALTER TABLE `tb_subsetor_interno`
  ADD PRIMARY KEY (`id_subsetor`);

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
-- AUTO_INCREMENT de tabela `tb_carrinho_transferencia`
--
ALTER TABLE `tb_carrinho_transferencia`
  MODIFY `id_carrinho_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tb_data_retirada`
--
ALTER TABLE `tb_data_retirada`
  MODIFY `id_data_retirada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tb_estoques`
--
ALTER TABLE `tb_estoques`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_historico`
--
ALTER TABLE `tb_historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de tabela `tb_lote`
--
ALTER TABLE `tb_lote`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `tb_nomeclatura`
--
ALTER TABLE `tb_nomeclatura`
  MODIFY `id_nomeclatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_p_emitido`
--
ALTER TABLE `tb_p_emitido`
  MODIFY `id_p_emitido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `tb_remedio`
--
ALTER TABLE `tb_remedio`
  MODIFY `id_remedio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `tb_saida`
--
ALTER TABLE `tb_saida`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_subsetor_interno`
--
ALTER TABLE `tb_subsetor_interno`
  MODIFY `id_subsetor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
