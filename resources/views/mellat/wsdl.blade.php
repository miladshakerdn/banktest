<?xml version='1.0' encoding='UTF-8'?>
<wsdl:definitions name="PaymentGatewayImplService" targetNamespace="http://service.pgw.sw.bps.com/"
    xmlns:ns1="http://interfaces.core.sw.bps.com/" xmlns:ns2="http://cxf.apache.org/bindings/xformat"
    xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/" xmlns:tns="http://service.pgw.sw.bps.com/"
    xmlns:wsdl="http://schemas.xmlsoap.org/wsdl/" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <wsdl:import location="{{ route('mellat.pay.wsdl') }}" namespace="http://interfaces.core.sw.bps.com/"></wsdl:import>
    <wsdl:binding name="PaymentGatewayImplServiceSoapBinding" type="ns1:IPaymentGateway">
        <soap:binding style="document" transport="http://schemas.xmlsoap.org/soap/http" />
        <wsdl:operation name="bpRefundRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpRefundRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpRefundRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpSaleReferenceIdRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpSaleReferenceIdRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpSaleReferenceIdRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpDynamicPayRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpDynamicPayRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpDynamicPayRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpInquiryRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpInquiryRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpInquiryRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpSettleRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpSettleRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpSettleRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpChargePayRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpChargePayRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpChargePayRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpCumulativeDynamicPayRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpCumulativeDynamicPayRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpCumulativeDynamicPayRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpPayRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpPayRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpPayRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpRefundInquiryRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpRefundInquiryRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpRefundInquiryRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpReversalRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpReversalRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpReversalRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpPosRefundRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpPosRefundRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpPosRefundRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpRefundToPANRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpRefundToPANRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpRefundToPANRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpVerifyRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpVerifyRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpVerifyRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
        <wsdl:operation name="bpRefundVerifyRequest">
            <soap:operation soapAction="" style="document" />
            <wsdl:input name="bpRefundVerifyRequest">
                <soap:body use="literal" />
            </wsdl:input>
            <wsdl:output name="bpRefundVerifyRequestResponse">
                <soap:body use="literal" />
            </wsdl:output>
        </wsdl:operation>
    </wsdl:binding>
    <wsdl:service name="PaymentGatewayImplService">
        <wsdl:port binding="tns:PaymentGatewayImplServiceSoapBinding" name="PaymentGatewayImplPort">
            <soap:address location="{{ route('mellat.serve') }}" />
        </wsdl:port>
    </wsdl:service>
</wsdl:definitions>