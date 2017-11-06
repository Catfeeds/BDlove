<?php
$config = array (
		//签名方式,默认为RSA2(RSA2048)
		'sign_type' => "RSA2",

		//支付宝公钥
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAqboAK/H9jbR0F/B5WjWSWeWpGkTSvxsXqrejE1JJWtfu9OtUROtMFlUuUu0ljSVDHAL5ReqlWjmabUvFC5JnBTUFNIweBfYqIZnwu67qovPIuBqfSfHFPV/58+PIxuOwCMXfKgNu7IYxAwIwfFhZQ+rQSwVWlm3siBhym65dY3pSe1FaB7Jt1hUySaZ7u3nBsVmILnkz6zUsSebh7CtBY14V81tG9uJjWruLF520HPia4bw2rvQQ6RSbLCmiGthNL/61Ro3BDKjrsV4tvJF2UcjlNTRr/AbaDx4yumomy91Wxf+lUOZwcF0yQ56Tp36JumSQfrOX34RRFQNyIHMfLQIDAQAB",

		//商户私钥
		'merchant_private_key' => "MIIEpAIBAAKCAQEAq/vuQWBxb57c8hatsGrHrnj6TfPPp2FSenOpYpHqLJ+Se/JYnOaUFjQCn26mXt9/s1XF/ldxnLnQfvt8RlUAR3Auhb30BapW+3V+0slT2rLlOUsfh2B6LxXmIqSwEk543Y6yFMqry9FTm9/qb5qxUIMDKJh6JXry3ycxGDErpzuLc6pT5xKk3ZJ8iNwOc7S/OObb7fx2XyVDX4IIR6pdTcviNmDYlNynSZMRtNSuIldCqp3tLeR0sea0E4AmpvgcUcG/G8PEstbSL2RqxzC9kZzQhCcBS1+N7kpur0ocxWciX4BMVY3PoZsO7z+ff9WoJbnuQ8rGscyBWvSaZe/e6QIDAQABAoIBAGDBXSr+nRLU5yxzQcgMasZnXTpZvitGf2ZQh6zitkHgjEKa9utedVWAcTFMyOB7EJbN3JPYkhxAFWI7DZFr5LpMDIBFe3FsgX76fR0NEtXo6ziuYNCCoHq48T3wNPY3m5vZ2aoE013ZKBZ7hKLA/pxy+GXwUlefsd+FZwNbNlngI7uUnIcLEmZn35Q2LncfWr/YX0qnOeb6Vb+l5FL4xD/rAhJ3zBvoKp8kjGWiSgDfRIU1N9aKjA3NC61b/F3Cto9ul3ATXowQVFwjei+pRDKJVovLJlXraMND3uB+2pSm8Q2MadJzkK1D6l3UGf/mOZfjYUH4prxW3kt15Bshu5kCgYEA2QIeBFI+cvRivWopUE9cSQXTgc+wy7u2aA7VrX1Fru+trH2LnJVIagTlrvlKHw/eaRCqA0ogbm6orILBeekiuTkG+dDurvx8n8/1qvUNsUkBFNNf/42pSSDSSdlVuuf4jWRn/eSWvcXWBCLpT3+f6QCFNNYjiablqqfVQmqkpAMCgYEAyuLOF1CtFIfIpv+NWvDT0UmXh+xXfn3McpGDLlVggbQYZDRFqBDveIb94DJvDU60FKhsqhwvNhJoxrZIYGF3URzGxs0jjcewzgLIO4PZD54nN4J+zy+x+RoXYYD/gwsmako5g4KMwoEnw8ij20wuoFgQ3/76O+IT6Qcbg5Qae6MCgYAIDmUQ4gDBgcMcpxFLkvapG1dDzXMRzTEzYcGbBDiPCwTWj36cXIporS/dtBGFX7BxFBZLsvfLQb5vURdfsEECwVQ5+AC0bFkwEadcJmbQuxYYMNSyhw7O0TIdXb0qCCyZCy41JcRW3T5ZvvYMZn+IReWsFXsSRCjokfx/z7e3AwKBgQCnEKiATnCXrVAvI9R0hEcH2b+rr5RElrZZyTTqXGeBpplHOjv5ryhiaVZ43U7Q+HQVZrNESL0fm30n1EY5B0lHQ5jzb0zNnRgcK/JR/7onwCWu8ggV98Jny3JhWeYNNItHjyNZBZF/QPdLotY66LqkUqBiswW/deTLSI0Bhl1gXQKBgQCYmmS0MHPPBFRbkbz5YilTIHFAtBsSIxl6roeXMZA4o3i3hzWrXjWFdww/UPIWP9Y6wvVx79NVtEpU08Wpd2yzXBiSd4HqUXoyNf2rOehLdODCPOK37mXIFZZGLDghDZp94RNKJ+nFAJISk+g5sdvpKOc633APEFKVSlLQEUxI2g==",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//应用ID
		'app_id' => "2017072407878079",

		//异步通知地址,只有扫码支付预下单可用
		'notify_url' => base_url('pay.php/Account/alipay_notify'),
		//'notify_url' => PLUGIN."admin.php/App/alipay_notify",
		//'notify_url' => "http://www.jukeyunduan.com/pay.php/Account/alipay_notify",

		//最大查询重试次数
		'MaxQueryRetry' => "10",

		//查询间隔
		'QueryDuration' => "3"
);