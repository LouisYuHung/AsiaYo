# AsiaYo - Exchange rate API

1. 請於TWD、JPY、USD中選取一種幣別作為source傳入
2. 請於TWD、JPY、USD中選取一種幣別作為target傳入
3. 請輸入欲轉換的金額，並以逗點分隔作為千分位表示

Status Code:
若status為error，則可能有以下情況：
1. source不存在於TWD、JPY、USD內
2. target不存在於TWD、JPY、USD內
若status為success，則amount即為匯率轉換後的數值
