<?xml version='1.0' encoding='UTF-8'?>
<wsdl:definitions name="IPaymentGateway" targetNamespace="http://interfaces.core.sw.bps.com/"
    xmlns:ns1="http://interfaces.core.sw.bps.com/" xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/"
    xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <wsdl:types>
        <xs:schema elementFormDefault="unqualified" targetNamespace="http://interfaces.core.sw.bps.com/" version="1.0"
            xmlns:tns="http://interfaces.core.sw.bps.com/" xmlns:xs="http://www.w3.org/2001/XMLSchema">
            <xs:element name="bpChargePayRequest" type="tns:bpChargePayRequest" />
            <xs:element name="bpChargePayRequestResponse" type="tns:bpChargePayRequestResponse" />
            <xs:element name="bpCumulativeDynamicPayRequest" type="tns:bpCumulativeDynamicPayRequest" />
            <xs:element name="bpCumulativeDynamicPayRequestResponse" type="tns:bpCumulativeDynamicPayRequestResponse" />
            <xs:element name="bpDynamicPayRequest" type="tns:bpDynamicPayRequest" />
            <xs:element name="bpDynamicPayRequestResponse" type="tns:bpDynamicPayRequestResponse" />
            <xs:element name="bpInquiryRequest" type="tns:bpInquiryRequest" />
            <xs:element name="bpInquiryRequestResponse" type="tns:bpInquiryRequestResponse" />
            <xs:element name="bpPayRequest" type="tns:bpPayRequest" />
            <xs:element name="bpPayRequestResponse" type="tns:bpPayRequestResponse" />
            <xs:element name="bpPosRefundRequest" type="tns:bpPosRefundRequest" />
            <xs:element name="bpPosRefundRequestResponse" type="tns:bpPosRefundRequestResponse" />
            <xs:element name="bpRefundInquiryRequest" type="tns:bpRefundInquiryRequest" />
            <xs:element name="bpRefundInquiryRequestResponse" type="tns:bpRefundInquiryRequestResponse" />
            <xs:element name="bpRefundRequest" type="tns:bpRefundRequest" />
            <xs:element name="bpRefundRequestResponse" type="tns:bpRefundRequestResponse" />
            <xs:element name="bpRefundToPANRequest" type="tns:bpRefundToPANRequest" />
            <xs:element name="bpRefundToPANRequestResponse" type="tns:bpRefundToPANRequestResponse" />
            <xs:element name="bpRefundVerifyRequest" type="tns:bpRefundVerifyRequest" />
            <xs:element name="bpRefundVerifyRequestResponse" type="tns:bpRefundVerifyRequestResponse" />
            <xs:element name="bpReversalRequest" type="tns:bpReversalRequest" />
            <xs:element name="bpReversalRequestResponse" type="tns:bpReversalRequestResponse" />
            <xs:element name="bpSaleReferenceIdRequest" type="tns:bpSaleReferenceIdRequest" />
            <xs:element name="bpSaleReferenceIdRequestResponse" type="tns:bpSaleReferenceIdRequestResponse" />
            <xs:element name="bpSettleRequest" type="tns:bpSettleRequest" />
            <xs:element name="bpSettleRequestResponse" type="tns:bpSettleRequestResponse" />
            <xs:element name="bpVerifyRequest" type="tns:bpVerifyRequest" />
            <xs:element name="bpVerifyRequestResponse" type="tns:bpVerifyRequestResponse" />
            <xs:complexType name="bpRefundRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="saleOrderId" type="xs:long" />
                    <xs:element name="saleReferenceId" type="xs:long" />
                    <xs:element name="refundAmount" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpRefundRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpSaleReferenceIdRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="saleOrderId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpSaleReferenceIdRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpDynamicPayRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="amount" type="xs:long" />
                    <xs:element minOccurs="0" name="localDate" type="xs:string" />
                    <xs:element minOccurs="0" name="localTime" type="xs:string" />
                    <xs:element minOccurs="0" name="additionalData" type="xs:string" />
                    <xs:element minOccurs="0" name="callBackUrl" type="xs:string" />
                    <xs:element minOccurs="0" name="payerId" type="xs:string" />
                    <xs:element name="subServiceId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpDynamicPayRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpInquiryRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="saleOrderId" type="xs:long" />
                    <xs:element name="saleReferenceId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpInquiryRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpSettleRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="saleOrderId" type="xs:long" />
                    <xs:element name="saleReferenceId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpSettleRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpChargePayRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="amount" type="xs:long" />
                    <xs:element minOccurs="0" name="localDate" type="xs:string" />
                    <xs:element minOccurs="0" name="localTime" type="xs:string" />
                    <xs:element minOccurs="0" name="additionalData" type="xs:string" />
                    <xs:element minOccurs="0" name="callBackUrl" type="xs:string" />
                    <xs:element minOccurs="0" name="payerId" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpChargePayRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpCumulativeDynamicPayRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="amount" type="xs:long" />
                    <xs:element minOccurs="0" name="localDate" type="xs:string" />
                    <xs:element minOccurs="0" name="localTime" type="xs:string" />
                    <xs:element minOccurs="0" name="additionalData" type="xs:string" />
                    <xs:element minOccurs="0" name="callBackUrl" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpCumulativeDynamicPayRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpPayRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="amount" type="xs:long" />
                    <xs:element minOccurs="0" name="localDate" type="xs:string" />
                    <xs:element minOccurs="0" name="localTime" type="xs:string" />
                    <xs:element minOccurs="0" name="additionalData" type="xs:string" />
                    <xs:element minOccurs="0" name="callBackUrl" type="xs:string" />
                    <xs:element minOccurs="0" name="payerId" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpPayRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpRefundInquiryRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="refundOrderId" type="xs:long" />
                    <xs:element name="refundReferenceId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpRefundInquiryRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpReversalRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="saleOrderId" type="xs:long" />
                    <xs:element name="saleReferenceId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpReversalRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpPosRefundRequest">
                <xs:sequence>
                    <xs:element minOccurs="0" name="user" type="xs:string" />
                    <xs:element minOccurs="0" name="password" type="xs:string" />
                    <xs:element name="saleReferenceId" type="xs:long" />
                    <xs:element name="refundAmount" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpPosRefundRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpRefundToPANRequest">
                <xs:sequence>
                    <xs:element minOccurs="0" name="user" type="xs:string" />
                    <xs:element minOccurs="0" name="password" type="xs:string" />
                    <xs:element minOccurs="0" name="pan" type="xs:long" />
                    <xs:element name="amount" type="xs:long" />
                    <xs:element minOccurs="0" name="saleReferenceId" type="xs:long" />
                    <xs:element name="terminalId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpRefundToPANRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpVerifyRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="saleOrderId" type="xs:long" />
                    <xs:element name="saleReferenceId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpVerifyRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpRefundVerifyRequest">
                <xs:sequence>
                    <xs:element name="terminalId" type="xs:long" />
                    <xs:element minOccurs="0" name="userName" type="xs:string" />
                    <xs:element minOccurs="0" name="userPassword" type="xs:string" />
                    <xs:element name="orderId" type="xs:long" />
                    <xs:element name="refundOrderId" type="xs:long" />
                    <xs:element name="refundReferenceId" type="xs:long" />
                </xs:sequence>
            </xs:complexType>
            <xs:complexType name="bpRefundVerifyRequestResponse">
                <xs:sequence>
                    <xs:element minOccurs="0" name="return" type="xs:string" />
                </xs:sequence>
            </xs:complexType>
        </xs:schema>
    </wsdl:types>
    <wsdl:message name="bpRefundRequest">
        <wsdl:part element="ns1:bpRefundRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpSaleReferenceIdRequestResponse">
        <wsdl:part element="ns1:bpSaleReferenceIdRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpVerifyRequestResponse">
        <wsdl:part element="ns1:bpVerifyRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpDynamicPayRequest">
        <wsdl:part element="ns1:bpDynamicPayRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpInquiryRequest">
        <wsdl:part element="ns1:bpInquiryRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpPayRequestResponse">
        <wsdl:part element="ns1:bpPayRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpInquiryRequestResponse">
        <wsdl:part element="ns1:bpInquiryRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpSettleRequest">
        <wsdl:part element="ns1:bpSettleRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpChargePayRequestResponse">
        <wsdl:part element="ns1:bpChargePayRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpChargePayRequest">
        <wsdl:part element="ns1:bpChargePayRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpSettleRequestResponse">
        <wsdl:part element="ns1:bpSettleRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpVerifyRequest">
        <wsdl:part element="ns1:bpVerifyRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpSaleReferenceIdRequest">
        <wsdl:part element="ns1:bpSaleReferenceIdRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpReversalRequestResponse">
        <wsdl:part element="ns1:bpReversalRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpCumulativeDynamicPayRequestResponse">
        <wsdl:part element="ns1:bpCumulativeDynamicPayRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpRefundInquiryRequestResponse">
        <wsdl:part element="ns1:bpRefundInquiryRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpPosRefundRequestResponse">
        <wsdl:part element="ns1:bpPosRefundRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpCumulativeDynamicPayRequest">
        <wsdl:part element="ns1:bpCumulativeDynamicPayRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpRefundToPANRequestResponse">
        <wsdl:part element="ns1:bpRefundToPANRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpRefundRequestResponse">
        <wsdl:part element="ns1:bpRefundRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpPayRequest">
        <wsdl:part element="ns1:bpPayRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpRefundInquiryRequest">
        <wsdl:part element="ns1:bpRefundInquiryRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpDynamicPayRequestResponse">
        <wsdl:part element="ns1:bpDynamicPayRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpReversalRequest">
        <wsdl:part element="ns1:bpReversalRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpPosRefundRequest">
        <wsdl:part element="ns1:bpPosRefundRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpRefundToPANRequest">
        <wsdl:part element="ns1:bpRefundToPANRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpRefundVerifyRequest">
        <wsdl:part element="ns1:bpRefundVerifyRequest" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:message name="bpRefundVerifyRequestResponse">
        <wsdl:part element="ns1:bpRefundVerifyRequestResponse" name="parameters"></wsdl:part>
    </wsdl:message>
    <wsdl:portType name="IPaymentGateway">
        <wsdl:operation name="bpRefundRequest">
            <wsdl:input message="ns1:bpRefundRequest" name="bpRefundRequest"></wsdl:input>
            <wsdl:output message="ns1:bpRefundRequestResponse" name="bpRefundRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpSaleReferenceIdRequest">
            <wsdl:input message="ns1:bpSaleReferenceIdRequest" name="bpSaleReferenceIdRequest"></wsdl:input>
            <wsdl:output message="ns1:bpSaleReferenceIdRequestResponse" name="bpSaleReferenceIdRequestResponse">
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpDynamicPayRequest">
            <wsdl:input message="ns1:bpDynamicPayRequest" name="bpDynamicPayRequest"></wsdl:input>
            <wsdl:output message="ns1:bpDynamicPayRequestResponse" name="bpDynamicPayRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpInquiryRequest">
            <wsdl:input message="ns1:bpInquiryRequest" name="bpInquiryRequest"></wsdl:input>
            <wsdl:output message="ns1:bpInquiryRequestResponse" name="bpInquiryRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpSettleRequest">
            <wsdl:input message="ns1:bpSettleRequest" name="bpSettleRequest"></wsdl:input>
            <wsdl:output message="ns1:bpSettleRequestResponse" name="bpSettleRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpChargePayRequest">
            <wsdl:input message="ns1:bpChargePayRequest" name="bpChargePayRequest"></wsdl:input>
            <wsdl:output message="ns1:bpChargePayRequestResponse" name="bpChargePayRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpCumulativeDynamicPayRequest">
            <wsdl:input message="ns1:bpCumulativeDynamicPayRequest" name="bpCumulativeDynamicPayRequest"></wsdl:input>
            <wsdl:output message="ns1:bpCumulativeDynamicPayRequestResponse"
                name="bpCumulativeDynamicPayRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpPayRequest">
            <wsdl:input message="ns1:bpPayRequest" name="bpPayRequest"></wsdl:input>
            <wsdl:output message="ns1:bpPayRequestResponse" name="bpPayRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpRefundInquiryRequest">
            <wsdl:input message="ns1:bpRefundInquiryRequest" name="bpRefundInquiryRequest"></wsdl:input>
            <wsdl:output message="ns1:bpRefundInquiryRequestResponse" name="bpRefundInquiryRequestResponse">
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpReversalRequest">
            <wsdl:input message="ns1:bpReversalRequest" name="bpReversalRequest"></wsdl:input>
            <wsdl:output message="ns1:bpReversalRequestResponse" name="bpReversalRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpPosRefundRequest">
            <wsdl:input message="ns1:bpPosRefundRequest" name="bpPosRefundRequest"></wsdl:input>
            <wsdl:output message="ns1:bpPosRefundRequestResponse" name="bpPosRefundRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpRefundToPANRequest">
            <wsdl:input message="ns1:bpRefundToPANRequest" name="bpRefundToPANRequest"></wsdl:input>
            <wsdl:output message="ns1:bpRefundToPANRequestResponse" name="bpRefundToPANRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpVerifyRequest">
            <wsdl:input message="ns1:bpVerifyRequest" name="bpVerifyRequest"></wsdl:input>
            <wsdl:output message="ns1:bpVerifyRequestResponse" name="bpVerifyRequestResponse"></wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpRefundVerifyRequest">
            <wsdl:input message="ns1:bpRefundVerifyRequest" name="bpRefundVerifyRequest"></wsdl:input>
            <wsdl:output message="ns1:bpRefundVerifyRequestResponse" name="bpRefundVerifyRequestResponse"></wsdl:output>
        </wsdl:operation>
    </wsdl:portType>
</wsdl:definitions>