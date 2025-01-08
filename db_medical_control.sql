-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2025 às 15:49
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
-- Estrutura da tabela `tb_ajuste_inventario`
--

CREATE TABLE `tb_ajuste_inventario` (
  `id_ajuste_inventario` int(11) NOT NULL,
  `id_remedio_ajuste_inventario` int(11) NOT NULL,
  `valor_ajuste_inventario` int(11) NOT NULL,
  `usuario_ajuste_inventario` int(11) NOT NULL,
  `obs_ajuste_inventario` text NOT NULL,
  `data_ajuste_inventario` date NOT NULL,
  `id_estoque_ajuste_inventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_ajuste_inventario`
--

INSERT INTO `tb_ajuste_inventario` (`id_ajuste_inventario`, `id_remedio_ajuste_inventario`, `valor_ajuste_inventario`, `usuario_ajuste_inventario`, `obs_ajuste_inventario`, `data_ajuste_inventario`, `id_estoque_ajuste_inventario`) VALUES
(1, 78, 78, 1, 'OI pode sodae isso', '2025-01-08', 7),
(2, 78, 78, 1, 'Ajuste feito manualmente', '2025-01-08', 7),
(3, 78, 78, 1, 'Ajustando com 300', '2025-01-08', 7);

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

--
-- Extraindo dados da tabela `tb_carrinho_transferencia`
--

INSERT INTO `tb_carrinho_transferencia` (`id_carrinho_transferencia`, `id_remedio_carrinho_transferencia`, `nome_carrinho_transferencia`, `quantidade_carrinho_transferencia`, `estoque_enviado_carrinho_transferencia`, `estoque_destino_carrinho_transferencia`, `data_carrinho_transferencia`, `lote_carrinho_transferencia`, `status_carrinho_transferencia`) VALUES
(39, 77, 'TRAMADOL 50MG/2ML', 5, 9, 8, '2024-12-20', '151254', 'A');

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
(37, 79, '2024-12-20', '2024-12-20', '001', 'Luiza Bezerra Nogueira'),
(38, 81, '2024-12-20', '2024-12-20', '0002', 'Andreza Rosa De Moura'),
(39, 82, '2024-12-20', '2024-12-20', '0003', 'Olivia Leandro De Moraes'),
(40, 82, '2024-12-20', '2024-12-21', '12345678900', 'Luiza Bezerra Nogueira'),
(41, 83, '2025-01-08', '2025-01-11', '1234567', 'Amarilia De Souza Sobral'),
(42, 83, '2025-01-08', '2025-01-11', '98765432100', 'Olivia Leandro De Moraes'),
(43, 83, '2025-01-08', '2025-01-25', '12345678912', 'Andreza Rosa De Moura'),
(44, 83, '2025-01-08', '2025-01-17', '98765432112', 'Andreza Rosa De Moura');

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
(49, 'TEste 001', '2024-12-20 00:00:00', 'Luan Leandro Nogueira', 'TRAMADOL 50MG/2ML', 5, 9, 8);

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
(63, '151254', 'A');

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
-- Estrutura da tabela `tb_preco_pedido`
--

CREATE TABLE `tb_preco_pedido` (
  `id_preco_pedido` int(11) NOT NULL,
  `nome_preco_pedido` varchar(100) NOT NULL,
  `v_unidade_preco_pedido` float NOT NULL,
  `data_preco_pedido` date NOT NULL,
  `quantidade_preco_pedido` int(11) NOT NULL,
  `valor_total_preco_pedido` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(31, 9, 'TRAMADOL 50MG/2ML', 10, '2026-12-05', 'LZ453', 'NEOQUIMICA', 9),
(32, 9, 'DIPIRONA DE 20MG', 300, '2026-12-28', 'LZ453', 'AZIPHARMA', 8),
(33, 9, 'LOSARTANA 50MG', 10, '2026-12-31', 'LZ453', 'CIMED', 8),
(34, 9, 'CORUS 100 MG', 10, '2026-12-31', 'LZ453', 'NEOQUIMICA', 8),
(35, 9, 'DIPIRONA DE 20MG', 21, '2024-12-27', 'AZ165GEE', 'EUROPHARMA', 7),
(36, 9, 'DIPIRONA DE 20MG', 23, '2028-12-26', 'QWE1121', 'EUROPHARMA', 7),
(37, 9, 'AMOXILINA 50ML', 13, '2024-12-31', 'QWE1121', 'MEDIAL ', 7),
(38, 9, 'AAS 50MG', 1000, '2029-12-28', 'AZ165GEE', 'EUROPHARMA', 9);

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
(77, 'TRAMADOL 50MG/2ML', 'CARTELA', 2, 0, '2026-12-05', 9),
(78, 'TRAMADOL 50MG/2ML', 'CARTELA', 300, 0, '2026-12-05', 7),
(79, 'DIPIRONA DE 20MG', 'CARTELA', 270, 100, '2026-12-28', 8),
(80, 'LOSARTANA 50MG', 'CARTELA', 0, 300, '2026-12-31', 8),
(81, 'CORUS 100 MG', 'CARTELA', 4, 100, '2026-12-31', 8),
(82, 'TRAMADOL 50MG/2ML', 'CARTELA', 2, 0, '2026-12-05', 8),
(83, 'DIPIRONA DE 20MG', 'CARTELA', 22, 100, '2028-12-26', 7),
(84, 'AMOXILINA 50ML', 'CARTELA', 13, 60, '2024-12-31', 7),
(85, 'AAS 50MG', 'CARTELA', 1000, 0, '2029-12-28', 9);

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
(59, 'Com Receita', 79, 'DIPIRONA DE 20MG', 9, '001', 'Luiza Bezerra Nogueira', '1234', '', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-12-20 00:00:00', 8),
(60, 'Com Receita', 81, 'CORUS 100 MG', 1, '0002', 'Andreza Rosa De Moura', '1234', '', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-12-20 00:00:00', 8),
(61, 'Com Receita', 82, 'TRAMADOL 50MG/2ML', 2, '0003', 'Olivia Leandro De Moraes', '321', '', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-12-20 00:00:00', 8),
(62, 'Com Receita', 82, 'TRAMADOL 50MG/2ML', 1, '12345678900', 'Luiza Bezerra Nogueira', '1234', '', 'Aylla De Kássia Alves Ferreira Nogueira', '2024-12-20 00:00:00', 8),
(63, 'Com Receita', 83, 'DIPIRONA DE 20MG', 1, '1234567', 'Amarilia De Souza Sobral', '1234', '', 'Luan Leandro Nogueira', '2025-01-08 00:00:00', 7),
(64, 'Com Receita', 83, 'DIPIRONA DE 20MG', 1, '98765432100', 'Olivia Leandro De Moraes', '1234', '', 'Luan Leandro Nogueira', '2025-01-08 00:00:00', 7),
(65, 'Com Receita', 83, 'DIPIRONA DE 20MG', 1, '12345678912', 'Andreza Rosa De Moura', '1234', '', 'Luan Leandro Nogueira', '2025-01-08 00:00:00', 7),
(66, 'Com Receita', 83, 'DIPIRONA DE 20MG', 1, '98765432112', 'Andreza Rosa De Moura', '1234', '', 'Luan Leandro Nogueira', '2025-01-08 00:00:00', 7);

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
-- Estrutura da tabela `tb_transferencia_interna`
--

CREATE TABLE `tb_transferencia_interna` (
  `id_transferencia_interna` int(11) NOT NULL,
  `data_transferencia_interna` date NOT NULL,
  `id_remedio_transferencia_interna` int(11) NOT NULL,
  `remedio_transferencia_interna` varchar(200) NOT NULL,
  `uni_transferencia_interna` varchar(100) NOT NULL,
  `id_estoque_transferencia_interna` int(11) NOT NULL,
  `quant_transferencia_interna` int(11) NOT NULL,
  `subsetor_transferencia_interna` int(11) NOT NULL,
  `usuario_transferencia_interna` varchar(100) NOT NULL,
  `status_transferencia_interna` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tb_transferencia_interna`
--

INSERT INTO `tb_transferencia_interna` (`id_transferencia_interna`, `data_transferencia_interna`, `id_remedio_transferencia_interna`, `remedio_transferencia_interna`, `uni_transferencia_interna`, `id_estoque_transferencia_interna`, `quant_transferencia_interna`, `subsetor_transferencia_interna`, `usuario_transferencia_interna`, `status_transferencia_interna`) VALUES
(41, '2024-12-20', 77, 'TRAMADOL 50MG/2ML', 'CARTELA', 9, 4, 0, 'Luan Leandro Nogueira', 'A'),
(42, '2024-12-20', 79, 'DIPIRONA DE 20MG', 'CARTELA', 8, 9, 0, 'Aylla De Kássia Alves Ferreira Nogueira', 'A'),
(43, '2025-01-08', 83, 'DIPIRONA DE 20MG', 'CARTELA', 7, 1, 3, 'Luan Leandro Nogueira', 'F'),
(44, '2025-01-08', 83, 'DIPIRONA DE 20MG', 'CARTELA', 7, 1, 0, 'Luan Leandro Nogueira', 'A');

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
-- Índices para tabela `tb_ajuste_inventario`
--
ALTER TABLE `tb_ajuste_inventario`
  ADD PRIMARY KEY (`id_ajuste_inventario`);

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
-- Índices para tabela `tb_preco_pedido`
--
ALTER TABLE `tb_preco_pedido`
  ADD PRIMARY KEY (`id_preco_pedido`);

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
-- Índices para tabela `tb_transferencia_interna`
--
ALTER TABLE `tb_transferencia_interna`
  ADD PRIMARY KEY (`id_transferencia_interna`);

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
-- AUTO_INCREMENT de tabela `tb_ajuste_inventario`
--
ALTER TABLE `tb_ajuste_inventario`
  MODIFY `id_ajuste_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_carrinho_transferencia`
--
ALTER TABLE `tb_carrinho_transferencia`
  MODIFY `id_carrinho_transferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `tb_data_retirada`
--
ALTER TABLE `tb_data_retirada`
  MODIFY `id_data_retirada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `tb_estoques`
--
ALTER TABLE `tb_estoques`
  MODIFY `id_estoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_historico`
--
ALTER TABLE `tb_historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `tb_lote`
--
ALTER TABLE `tb_lote`
  MODIFY `id_lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
-- AUTO_INCREMENT de tabela `tb_preco_pedido`
--
ALTER TABLE `tb_preco_pedido`
  MODIFY `id_preco_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_p_emitido`
--
ALTER TABLE `tb_p_emitido`
  MODIFY `id_p_emitido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `tb_remedio`
--
ALTER TABLE `tb_remedio`
  MODIFY `id_remedio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de tabela `tb_saida`
--
ALTER TABLE `tb_saida`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de tabela `tb_subsetor_interno`
--
ALTER TABLE `tb_subsetor_interno`
  MODIFY `id_subsetor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_transferencia_interna`
--
ALTER TABLE `tb_transferencia_interna`
  MODIFY `id_transferencia_interna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
