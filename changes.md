Key:
774dd95003ee9a678e3c1de8fef356c1

Alterações:
___________________________

Arquivo: /Users/danyelsanches/Documents/Carisma/site/workspace/carismalembrancas/skin/frontend/base/default/onestepcheckout/js/validation.js

Alteração da url, linhas 150 e 171

_______________________________________________________________________________________

Arquivo:  ~/Documents/Carisma/site/workspace/carismalembrancas/app/design/frontend/shopper/default/locale/pt_BR/translate.csv

Traduções
_______________________________________________________________________________________

Arquivo: ~/Documents/Carisma/site/workspace/carismalembrancas/skin/frontend/shopper/default/css/local.css

Alteração do css (header a.logo) margin:15px na linha 340

_______________________________________________________________________________________

Arquivo: app\design\frontend\base\default\template\onestepcheckout\onestep\form\address\billing.phtml -

Substituir
LINHA 252 - var url = /onestepcheckout/ajax/check_taxvat/'; por
url = '<?php echo Mage::getBaseUrl();?>/onestepcheckout/ajax/check_taxvat/';

LINHA 281 - var url = '/onestepcheckout/ajax/check_email/'; por
var url = '<?php echo Mage::getBaseUrl();?>/onestepcheckout/ajax/check_email/';

_______________________________________________________________________________________

Arquivo: app\design\frontend\base\default\template\onestepcheckout\persistent\customer\form\register.phtml

Substituir

LINHA 250 - var url = '/onestepcheckout/ajax/check_email/'; por var url = '<?php echo Mage::getBaseUrl();?>/onestepcheckout/ajax/check_email/';

LINHA 279 - var url = /onestepcheckout/ajax/check_taxvat/'; por var url = '<?php echo Mage::getBaseUrl();?>/onestepcheckout/ajax/check_taxvat/';

_______________________________________________________________________________________


Arquivos: /Users/danyelsanches/Documents/Carisma/site/workspace/carismalembrancas/app/design/frontend/base/default/template/checkout/success.phtml, 
/Users/danyelsanches/Documents/Carisma/site/workspace/carismalembrancas/app/design/frontend/default/iphone/template/checkout/success.phtml,
/Users/danyelsanches/Documents/Carisma/site/workspace/carismalembrancas/app/locale/en_US/Mage_Checkout.csv,
/Users/danyelsanches/Documents/Carisma/site/workspace/carismalembrancas/app/locale/pt_BR/Mage_Checkout.csv


Alteração mensagem:

Click <a href="%s" onclick="this.target=\'_blank\'">here to print</a> a copy of your order confirmation

Para:

Click here to print a copy of your order confirmation

________________________________________________________________________________________

Arquivo: /Users/danyelsanches/Documents/Carisma/site/workspace/carismalembrancas/skin/frontend/base/default/onestepcheckout/js/login.js

Alterado linha 85: height: this.currentVisibleBlock.getHeight() + 'px'
para height: '100%'

________________________________________________________________________________________

Arquivo: /Users/danyelsanches/Documents/Carisma/site/workspace/carismalembrancas/app/code/community/Query/Cielo/controllers/AdminController.php

Na linha 152, adicionada regra para tratar erro de solicitação de cancelamento:

if (!$xml){	
			$html = '<b style="color:red;">Erro ao solicitar o cancelamento!</b>';
			$this->getResponse()->setBody($html);
		}

________________________________________________________________________________________

Arquivo: /Users/danyelsanches/Documents/Carisma/site/workspace/carismashop/app/code/community/PedroTeixeira/Correios/Model/Carrier/CorreiosMethod.php

/Users/danyelsanches/Documents/Carisma/site/workspace/carismashop/app/code/community/PedroTeixeira/Correios/etc/system.xml

/Users/danyelsanches/Documents/Carisma/site/workspace/carismashop/app/code/community/PedroTeixeira/Correios/etc/config.xml

Alteração para fazer o calculo do prazo de entrega de acordo com o prazo de fabricação.

________________________________________________________________________________________


Adicionado suporte a Color Swatches no tema shopper:

https://www.bemaged.com/en/blog/use-magento-swatches-in-custom-theme/

________________________________________________________________________________________

Arquivos:
/Users/danyelsanches/Documents/Carisma/site/workspace/carismashop/app/code/community/Query/Cielo/Model/Cc.php

/Users/danyelsanches/Documents/Carisma/site/workspace/carismashop/app/code/community/Query/Cielo/Model/Dc.php

Alterando o postback de “querycielo/pay/verify" para “checkout/onepage/success”.
Alteração para utilizar a página de sucesso original ou com o módulo “Custom Success Page For Magento”   