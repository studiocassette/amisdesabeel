import { useState } from "react";
import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import { Mail, CheckCircle, Loader2 } from "lucide-react";
import { cn } from "@/lib/utils";

interface NewsletterFormProps {
  className?: string;
  variant?: 'default' | 'compact';
}

export const NewsletterForm = ({ className, variant = 'default' }: NewsletterFormProps) => {
  const [email, setEmail] = useState("");
  const [status, setStatus] = useState<'idle' | 'loading' | 'success' | 'error'>('idle');
  const [errorMessage, setErrorMessage] = useState("");

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    
    if (!email || !email.includes('@')) {
      setStatus('error');
      setErrorMessage("Veuillez entrer une adresse email valide.");
      return;
    }

    setStatus('loading');
    
    // Simulated API call
    await new Promise(resolve => setTimeout(resolve, 1000));
    
    setStatus('success');
    setEmail("");
  };

  if (status === 'success') {
    return (
      <div className={cn("flex items-center gap-3 p-4 bg-primary/10 rounded-lg", className)}>
        <CheckCircle className="h-5 w-5 text-primary flex-shrink-0" />
        <div>
          <p className="font-medium text-sm">Inscription réussie !</p>
          <p className="text-xs text-muted-foreground">
            Vous recevrez nos prochaines publications par email.
          </p>
        </div>
      </div>
    );
  }

  if (variant === 'compact') {
    return (
      <form onSubmit={handleSubmit} className={cn("flex gap-2", className)}>
        <div className="relative flex-1">
          <Mail className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
          <Input
            type="email"
            placeholder="Votre email"
            value={email}
            onChange={(e) => {
              setEmail(e.target.value);
              if (status === 'error') setStatus('idle');
            }}
            className="pl-10"
          />
        </div>
        <Button type="submit" disabled={status === 'loading'}>
          {status === 'loading' ? (
            <Loader2 className="h-4 w-4 animate-spin" />
          ) : (
            "S'abonner"
          )}
        </Button>
      </form>
    );
  }

  return (
    <form onSubmit={handleSubmit} className={cn("space-y-3", className)}>
      <div className="relative">
        <Mail className="absolute left-3 top-1/2 -translate-y-1/2 h-4 w-4 text-muted-foreground" />
        <Input
          type="email"
          placeholder="Entrez votre adresse email"
          value={email}
          onChange={(e) => {
            setEmail(e.target.value);
            if (status === 'error') setStatus('idle');
          }}
          className={cn(
            "pl-10",
            status === 'error' && "border-destructive focus-visible:ring-destructive"
          )}
        />
      </div>
      {status === 'error' && (
        <p className="text-xs text-destructive">{errorMessage}</p>
      )}
      <Button type="submit" className="w-full" disabled={status === 'loading'}>
        {status === 'loading' ? (
          <>
            <Loader2 className="h-4 w-4 animate-spin mr-2" />
            Inscription...
          </>
        ) : (
          "S'abonner à la newsletter"
        )}
      </Button>
      <p className="text-xs text-muted-foreground text-center">
        Nous respectons votre vie privée. Désabonnement possible à tout moment.
      </p>
    </form>
  );
};
