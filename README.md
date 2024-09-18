# AC System - Gerenciamento de Ar-Condicionados e Horários dos Laboratórios

## Visão Geral

O **AC System** é um sistema projetado para gerenciar de forma eficiente o uso de ar-condicionados nos laboratórios da Coordenação de Informática do Instituto Federal de Sergipe (IFS). O objetivo principal do sistema é otimizar o consumo de energia elétrica, utilizando sensores de presença e uma interface web para controlar os horários de funcionamento dos aparelhos. O sistema é integrado a dispositivos ESP32, que recebem comandos do servidor web para ligar e desligar os ar-condicionados automaticamente, dependendo dos horários registrados e a detecção de pessoas na sala com os sensores de presença.

## Funcionalidades

- **Controle Automático de Ar-Condicionado**: Os ar-condicionados são controlados automaticamente de acordo com a presença de pessoas nos laboratórios, com base nas leituras dos sensores de presença.
- **Interface Web para Gerenciamento**: Um painel de controle online permite visualizar o estado atual dos ar-condicionados e configurar horários de funcionamento.
- **Sensores de Presença**: Sensores conectados ao ESP32 detectam se há pessoas presentes no laboratório, ligando ou desligando o ar-condicionado de acordo com a necessidade.
- **Otimização de Consumo**: O sistema visa reduzir o consumo energético ao evitar que os aparelhos fiquem ligados desnecessariamente.
- **Relatórios de Uso**: Gera relatórios sobre o uso dos aparelhos, ajudando na análise de consumo e na tomada de decisões sobre economia de energia.

## Arquitetura

1. **ESP32**: Dispositivo responsável por receber os comandos do servidor e controlar o ar-condicionado. Também processa as informações dos sensores de presença.
2. **Sensores de Presença**: Detectam se há pessoas no laboratório e enviam essa informação ao ESP32.
3. **Servidor Web**: O servidor hospeda a interface de gerenciamento e envia comandos ao ESP32 com base na configuração e nas leituras dos sensores.
4. **Interface Web**: Um painel onde os administradores podem visualizar os estados dos aparelhos, configurar horários e verificar a presença de pessoas em tempo real.

## Tecnologias Utilizadas
- **HTML/CSS/JavaScript**: Para o desenvolvimento do painel web.
- **PHP/Laravel**: Para a comunicação com o banco de dados.
- **MYSQL**: Para o banco de dados.
