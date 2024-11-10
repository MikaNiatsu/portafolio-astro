import  { useState } from 'react';
import { Camera, Bus, User, Database, LineChart, Wifi, Cpu } from 'lucide-react';

const VisionArtificialFlow = () => {
  const [activeStep, setActiveStep] = useState(null);
  
  const stageColors = {
    capture: {
      base: '#e8f5e9',
      active: '#c8e6c9',
      border: '#4caf50'
    },
    processing: {
      base: '#fff3e0',
      active: '#ffe0b2',
      border: '#ff9800'
    },
    gateway: {
      base: '#e3f2fd',
      active: '#bbdefb',
      border: '#2196f3'
    },
    platform: {
      base: '#fce4ec',
      active: '#f8bbd0',
      border: '#e91e63'
    },
    analysis: {
      base: '#f3e5f5',
      active: '#e1bee7',
      border: '#9c27b0'
    }
  };

  const getStepStyle = (step) => ({
    transform: activeStep === step ? 'scale(1.05)' : 'scale(1)',
    transition: 'all 0.3s ease',
    cursor: 'pointer',
    opacity: activeStep === null || activeStep === step ? 1 : 0.7,
  });

  return (
    <div className="w-full max-w-6xl p-8 bg-white rounded-lg shadow-lg">      
      <div className="relative w-full">
        <svg viewBox="0 0 1200 400" className="w-full h-full">
          {/* Líneas de conexión curvas */}
          <path 
            d="M 150 200 C 220 200, 250 200, 300 200 C 400 200, 450 200, 520 200 C 650 200, 700 200, 780 200 C 900 200, 950 200, 1040 200" 
            stroke="#e0e0e0" 
            strokeWidth="4" 
            fill="none"
            strokeDasharray="8,8"
          />
          
          {/* Grupo 1: Captura */}
          <g 
            onClick={() => setActiveStep('capture')}
            style={getStepStyle('capture')}
          >
            <rect 
              x="50" y="50" 
              width="200" height="300" 
              fill={activeStep === 'capture' ? stageColors.capture.active : stageColors.capture.base}
              rx="10"
              stroke={activeStep === 'capture' ? stageColors.capture.border : 'none'}
              strokeWidth="3"
            />
            
            <circle cx="150" cy="150" r="35" fill="white" />
            <foreignObject x="125" y="125" width="50" height="50">
              <div className="flex items-center justify-center h-full">
                <Camera size={30} className="text-green-700" />
              </div>
            </foreignObject>
            <text x="150" y="200" textAnchor="middle" fill="#424242" fontSize="16">
              Cámaras IP
            </text>

            <circle cx="150" cy="250" r="35" fill="white" />
            <foreignObject x="125" y="225" width="50" height="50">
              <div className="flex items-center justify-center h-full">
                <Bus size={30} className="text-green-700" />
              </div>
            </foreignObject>
            <text x="150" y="300" textAnchor="middle" fill="#424242" fontSize="16">
              Detección de Buses
            </text>
          </g>

          {/* Grupo 2: Procesamiento IoT */}
          <g 
            onClick={() => setActiveStep('processing')}
            style={getStepStyle('processing')}
          >
            <rect 
              x="300" y="125" 
              width="160" height="150" 
              fill={activeStep === 'processing' ? stageColors.processing.active : stageColors.processing.base}
              rx="10"
              stroke={activeStep === 'processing' ? stageColors.processing.border : 'none'}
              strokeWidth="3"
            />
            <circle cx="380" cy="200" r="35" fill="white" />
            <foreignObject x="355" y="175" width="50" height="50">
              <div className="flex items-center justify-center h-full">
                <Cpu size={30} className="text-orange-700" />
              </div>
            </foreignObject>
            <text x="380" y="250" textAnchor="middle" fill="#424242" fontSize="16">
              Procesamiento
            </text>
          </g>
          
          {/* Grupo 3: Gateway */}
          <g 
            onClick={() => setActiveStep('gateway')}
            style={getStepStyle('gateway')}
          >
            <rect 
              x="520" y="125" 
              width="160" height="150" 
              fill={activeStep === 'gateway' ? stageColors.gateway.active : stageColors.gateway.base}
              rx="10"
              stroke={activeStep === 'gateway' ? stageColors.gateway.border : 'none'}
              strokeWidth="3"
            />
            <circle cx="600" cy="200" r="35" fill="white" />
            <foreignObject x="575" y="175" width="50" height="50">
              <div className="flex items-center justify-center h-full">
                <Wifi size={30} className="text-blue-700" />
              </div>
            </foreignObject>
            <text x="600" y="250" textAnchor="middle" fill="#424242" fontSize="16">
              MQTT/HTTP
            </text>
          </g>
          
          {/* Grupo 4: Plataforma IoT */}
          <g 
            onClick={() => setActiveStep('platform')}
            style={getStepStyle('platform')}
          >
            <rect 
              x="740" y="100" 
              width="180" height="200" 
              fill={activeStep === 'platform' ? stageColors.platform.active : stageColors.platform.base}
              rx="10"
              stroke={activeStep === 'platform' ? stageColors.platform.border : 'none'}
              strokeWidth="3"
            />
            <circle cx="830" cy="200" r="35" fill="white" />
            <foreignObject x="805" y="175" width="50" height="50">
              <div className="flex items-center justify-center h-full">
                <Database size={30} className="text-pink-700" />
              </div>
            </foreignObject>
            <text x="830" y="260" textAnchor="middle" fill="#424242" fontSize="16">
              Gestión de Datos
            </text>
          </g>
          
          {/* Grupo 5: Análisis */}
          <g 
            onClick={() => setActiveStep('analysis')}
            style={getStepStyle('analysis')}
          >
            <rect 
              x="980" y="125" 
              width="160" height="150" 
              fill={activeStep === 'analysis' ? stageColors.analysis.active : stageColors.analysis.base}
              rx="10"
              stroke={activeStep === 'analysis' ? stageColors.analysis.border : 'none'}
              strokeWidth="3"
            />
            <circle cx="1060" cy="200" r="35" fill="white" />
            <foreignObject x="1035" y="175" width="50" height="50">
              <div className="flex items-center justify-center h-full">
                <LineChart size={30} className="text-purple-700" />
              </div>
            </foreignObject>
            <text x="1060" y="250" textAnchor="middle" fill="#424242" fontSize="16">
              Tiempo Real
            </text>
          </g>
        </svg>
      </div>

      {/* Panel de información detallada */}
      <div className="mt-8 p-6 bg-gray-50 rounded-lg border-2 border-gray-200">
        <h3 className="text-xl font-semibold text-gray-800 mb-4">
          {activeStep ? (
            {
              'capture': '1. Captura de Datos en Tiempo Real',
              'processing': '2. Procesamiento IoT',
              'gateway': '3. Transmisión de Datos IoT',
              'platform': '4. Plataforma IoT',
              'analysis': '5. Análisis y Visualización'
            }[activeStep]
          ) : "Selecciona un elemento para más información"}
        </h3>
        <p className="text-md text-gray-700 leading-relaxed">
          {activeStep === 'capture' && 
            "Las cámaras IP y sensores capturan imágenes de conductores y buses en tiempo real en los puntos de entrada y salida. El sistema detecta automáticamente la presencia de biarticulados y registra su información."}
          {activeStep === 'processing' && 
            "El componente IoT procesa las imágenes usando algoritmos para el reconocimiento facial de conductores y la identificación de características del bus (codigo - placa), realizando el procesamiento en el borde."}
          {activeStep === 'gateway' && 
            "Los datos procesados se transmiten de forma segura a través de gateways IoT utilizando protocolos MQTT/HTTP. Estos gateways aseguran la integridad y confiabilidad de la información transmitida."}
          {activeStep === 'platform' && 
            "La plataforma IoT gestiona el registro y almacenamiento de los datos procesados, organizando la información para su posterior análisis y uso en diferentes aplicaciones del sistema."}
          {activeStep === 'analysis' && 
            "El sistema permite visualizar y analizar datos en tiempo real, generando reportes y alertas para optimizar la gestión de la flota. Los operadores pueden monitorear el estado de cada bus y conductor de manera eficiente."}
        </p>
      </div>
    </div>
  );
};

export default VisionArtificialFlow;