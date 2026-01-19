import { Toaster } from "@/components/ui/toaster";
import { Toaster as Sonner } from "@/components/ui/sonner";
import { TooltipProvider } from "@/components/ui/tooltip";
import { QueryClient, QueryClientProvider } from "@tanstack/react-query";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Index from "./pages/Index";
import NotFound from "./pages/NotFound";
import QuiSommesNous from "./pages/QuiSommesNous";

const queryClient = new QueryClient();

const App = () => (
  <QueryClientProvider client={queryClient}>
    <TooltipProvider>
      <Toaster />
      <Sonner />
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Index />} />
          {/* Pages principales - Phase 2+ */}
          <Route path="/documents-sabeel" element={<NotFound />} />
          <Route path="/kairos" element={<NotFound />} />
          <Route path="/publications" element={<NotFound />} />
          <Route path="/vagues-de-prieres" element={<NotFound />} />
          <Route path="/vagues-de-prieres/:id" element={<NotFound />} />
          <Route path="/partenaires" element={<NotFound />} />
          <Route path="/contact" element={<NotFound />} />
          <Route path="/qui-sommes-nous" element={<QuiSommesNous />} />
          <Route path="/article/:id" element={<NotFound />} />
          <Route path="/recherche" element={<NotFound />} />
          <Route path="/videos" element={<NotFound />} />
          <Route path="/cornerstone" element={<NotFound />} />
          <Route path="/mentions-legales" element={<NotFound />} />
          <Route path="/confidentialite" element={<NotFound />} />
          {/* ADD ALL CUSTOM ROUTES ABOVE THE CATCH-ALL "*" ROUTE */}
          <Route path="*" element={<NotFound />} />
        </Routes>
      </BrowserRouter>
    </TooltipProvider>
  </QueryClientProvider>
);

export default App;
